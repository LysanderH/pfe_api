<?php

namespace App\Http\Controllers;

use App\Events\UserConnectedToRoom;
use App\Mail\CourseStarted;
use App\Models\Course;
use App\Models\Group;
use App\Models\Room;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'offerer' => 'required|json',
            'group' => 'required',
            'lesson' => 'required',
        ]);

        info($validated);

        $connectedUser = $request->user();

        $room = Room::create([
            'offerer' => $validated['offerer']
        ]);

        $users = Group::with('users')->find($validated['group']);

        foreach ($users->users as $user) {
            Mail::to($user['email'])->cc('lysander.hans@hotmail.com')->send(new CourseStarted($room->id));
            $room->users()->attach($user->id);
        }

        $exercises = Course::with('exercises')->where('id', $validated['lesson'])->first()->exercises;

        return response()->json([
            'room' => $room,
            'user' => $connectedUser,
            'exercises' => $exercises
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }

    public function canConnect(Request $request, $room)
    {
        $room = Room::with('users')->where('id', $room)->first();

        foreach ($room->users as $user) {
            if ($user->id === $request->user()->id) {
                return response()->json([
                    'message' => 'Vous pouvez continuer',
                ]);
            }
        }

        return response()->json([
            'message' => 'Vous n’avez pas la permission de vous connecter'
        ], 503);
    }
}
