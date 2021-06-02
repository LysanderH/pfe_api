<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use Illuminate\Http\Request;

class VideoConference extends Controller
{
    public function information(Request $request)
    {
        $groups = Group::with('users')->whereHas('users', function ($q) use ($request) {
            $q->where('id', $request->user()->id)
                ->where('is_teacher', true);
        })->orderByDESC('created_at')->get();

        $courses = Course::with('exercises')->where('user_id', $request->user()->id)->orderByDESC('created_at')->get();


        return response()->json([
            'groups' => $groups,
            'lessons' => $courses
        ]);
    }
}
