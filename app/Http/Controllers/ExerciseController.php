<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Tactic;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->tactic) {
            $tactic = $request->tactic;
            $exercises = Exercise::with('tactics')->where('user_id', $request->user()->id)->whereHas('tactics', function (Builder $query) use ($tactic) {
                $query->where('name', $tactic);
            })->orderByDESC('created_at')->paginate(20);
        } else {
            $exercises = Exercise::with('tactics')->where('user_id', $request->user()->id)->orderByDESC('created_at')->paginate(20);
        }
        $tactics = Tactic::orderBy('name')->get();

        return response()->json([
            'exercises' => $exercises,
            'tactics' => $tactics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tactics = Tactic::orderBy('name')->get();

        return response()->json([
            'tactics' => $tactics
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
        info($request);
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tactic' => 'required'
        ]);

        info('test');

        $exercise = Exercise::create([
            'title' => $validated['title'],
            'content' => json_encode($validated['content']),
            'user_id' => $request->user()->id
        ]);

        $exercise->tactics()->attach(Tactic::where('name', $validated['tactic'])->first());

        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $exercise)
    {
        $tactics = Tactic::orderBy('name')->get();

        $findExercise = Exercise::with('users', 'tactics')->where('id', $exercise)->first();
        info($findExercise);
        if ($request->user()->id !== $findExercise->user_id) {
            $findExercise = [];
        }

        return response()->json([
            'tactics' => $tactics,
            'exercise' => $findExercise
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exercise)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tactic' => 'required'
        ]);

        $getExercise = Exercise::with('tactics')->where('id', $exercise)->first();

        foreach ($getExercise->tactics as $tactic) {
            $getExercise->tactics()->detach($tactic->id);
        }

        $getExercise->tactics()->attach(Tactic::where('name', $validated['tactic'])->first());

        $getExercise->update([
            'title' => $validated['title'],
            'content' => json_encode($validated['content']),
            'user_id' => $request->user()->id
        ]);

        $tactics = Tactic::orderBy('name')->get();

        return response()->json([
            'tactics' => $tactics,
            'exercise' => $getExercise
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $exercise)
    {
        $getExercise = Exercise::with('tactics')->where('id', $exercise)->first();

        if ($request->user()->id !== $getExercise->user_id) {
            return abort(403, 'Access denied');
        }

        foreach ($getExercise->tactics as $tactic) {
            $getExercise->tactics()->detach($tactic->id);
        }

        Exercise::destroy($exercise);
    }
}
