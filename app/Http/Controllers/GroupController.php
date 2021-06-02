<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = Group::with('users')->whereHas('users', function ($q) use ($request) {
            $q->where('id', $request->user()->id)
                ->where('is_teacher', true);
        })->orderByDESC('created_at')->paginate(10);

        return response()->json([
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', '=', $validated['email'])->first();

        return response()->json([
            'userExists' => $user ? true : false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'students' => 'required|array',
        ]);

        info($validated);

        $group = Group::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
        ]);

        $group->users()->attach($request->user()->id, ['is_teacher' => true]);

        foreach ($validated['students'] as $user) {
            $group->users()->attach(User::where('email', $user)->first()->id, ['is_teacher' => false]);
        }

        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($group, Request $request)
    {
        $findGroup = Group::with('users')->where('id', $group)->first();

        if (!$findGroup->users->contains($request->user())) {
            $findGroup = [];
        }

        return response()->json([
            'group' => $findGroup
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'students' => 'required|array',
        ]);

        $group = Group::with('users')->where('id', $group)->first();

        foreach ($group->users as $user) {
            $group->users()->detach($user->id);
        }

        $group->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
        ]);

        $group->users()->attach($request->user()->id, ['is_teacher' => true]);

        foreach ($validated['students'] as $user) {
            $group->users()->attach(User::where('email', $user)->first()->id, ['is_teacher' => false]);
        }

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $group)
    {
        $group = Group::with('users')->where('id', $group)->first();

        if (!$group->users->contains($request->user())) {
            return abort(403, 'Access denied');
        }

        foreach ($group->users as $user) {
            $group->users()->detach($user->id);
        }

        Group::destroy($group);
    }
}
