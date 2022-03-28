<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Videomed',
            'last_name'  => null,
            'last_name2' => null,
            'email'      => 'formatos@videomed.org',
            'password'   => Hash::make('Formatos@'),
            'role'       => ROLE_ADMIN
        ]);
    }
}
