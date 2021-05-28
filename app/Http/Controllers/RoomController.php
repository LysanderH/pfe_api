<?php

namespace App\Http\Controllers;

use App\Events\UserConnectedToRoom;
use App\Mail\CourseStarted;
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
            'group' => 'required'
        ]);

        info($validated);

        $room = Room::create([
            'offerer' => $validated['offerer']
        ]);

        // Envoyer les mails aux étudiants
        $users = Group::with('users')->find($validated['group']);
        info($users->users);


        foreach ($users->users as $user) {
            Mail::to($user['email'])->cc('lysander.hans@hotmail.com')->send(new CourseStarted($room->id));
        }

        UserConnectedToRoom::dispatch($room);

        return response()->json(['room' => $room]);
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

    public function connect(Request $request, Room $room)
    {
        return 'Connected';
    }
}
