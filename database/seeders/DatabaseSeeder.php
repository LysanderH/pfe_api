<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Tactic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TacticSeeder::class);
        $this->call(UserSeeder::class);

        $courses = Course::with('users')->get();

        foreach ($courses as $course) {
            $exercises = Exercise::factory()->count(8)->create(['user_id' => $course->user_id]);
            foreach ($exercises as $exercise) {
                $exercise->courses()->attach($course->id);
                $exercise->tactics()->attach(Tactic::all()->random()->id);
            }
        }
    }
}
