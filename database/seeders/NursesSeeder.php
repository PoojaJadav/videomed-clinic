<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class NursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(15)
            ->hasProfile(1)
            ->create([
                'role' => ROLE_NURSES,
            ]);
    }
}
