<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Tactic;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
            $exercises = Exercise::where('user_id', $request->user()->id)->whereHas('tactics', function (Builder $query) use ($tactic) {
                $query->where('name', $tactic);
            })->orderBy('created_at')->paginate(20);
        } else {
            $exercises = Exercise::where('user_id', $request->user()->id)->orderBy('created_at')->paginate(20);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
