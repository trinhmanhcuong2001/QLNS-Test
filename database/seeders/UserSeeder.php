<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(50)->hasPerson(1)->create();
        foreach($users as $user){
            $user->roles()->attach([rand(1,3), rand(1,3), rand(1 ,3)]);
        };
    }
}
