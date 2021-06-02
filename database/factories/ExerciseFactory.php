<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, false),
            'content' => json_encode(['fen' => '5Q2/p2B4/1p4n1/1P4qk/6N1/6K1/2p5/8 w - - 0 1']),
            // 'user_id' => Course::with('users')->whereHas('exercises', function ($q) {
            //     $q->where('exercises', $this->id);
            // })->get()->user->id
        ];
    }
}
