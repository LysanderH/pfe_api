<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Group;
use App\Models\Tactic;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()->count(300)->hasAttached(
            $users = User::factory()->count(1)->has(
                $course = Course::factory()->count(10)
            ),
            ['is_teacher' => true]
        )->hasAttached(
            User::factory()->count(4),
            ['is_teacher' => false]
        )->create();
    }
}
