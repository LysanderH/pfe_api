<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::where('user_id', $request->user()->id)->orderByDESC('created_at')->paginate(10);

        return response()->json(['courses' => $courses]);
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
            'title' => 'required',
            'description' => 'required',
            'exercises' => 'nullable'
        ]);

        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $request->user()->id
        ]);

        foreach ($validated['exercises'] as $exercise) {
            $course->exercises()->attach($exercise['id']);
        }

        return response()->json([
            'course' => $course,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $course)
    {
        $findCourse = Course::with('exercises')->where('id', $course)->first();

        if ($request->user()->id !== $findCourse->user_id) {
            return response()->json([
                'message' => 'Cet exercice ne vous appartient pas'
            ], 503);
        }

        return response()->json([
            'course' => $findCourse,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'exercises' => 'nullable'
        ]);

        info($validated['exercises']);

        $findCourse = Course::with('exercises')->where('id', $course)->first();

        if ($request->user()->id !== $findCourse->user_id) {
            return response()->json([
                'message' => 'Cet exercice ne vous appartient pas'
            ], 503);
        }

        foreach ($findCourse->exercises as $exercise) {
            $findCourse->exercises()->detach($exercise->id);
        }

        $findCourse->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        foreach ($validated['exercises'] as $exercise) {
            $findCourse->exercises()->attach($exercise['id']);
        }

        return response()->json([
            'course' => Course::with('exercises')->where('id', $course)->first() ?? []
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($course, Request $request)
    {
        $findCourse = Course::with('exercises')->where('id', $course)->first();


        if ($request->user()->id !== $findCourse->user_id) {
            return response()->json([
                'message' => 'Cet exercice ne vous appartient pas'
            ], 503);
        }

        foreach ($findCourse->exercises as $exercise) {
            $findCourse->exercises()->detach($exercise->id);
        }

        Course::destroy($course);

        return response()->json();
    }
}
