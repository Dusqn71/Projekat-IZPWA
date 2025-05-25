<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'role_id' => 2,
            'name' => 'admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('admin')
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'user',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('user')
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('editor')
        ]);


        User::create([
            'role_id' => 1,
            'name' => 'pprvulovic',
            'email' => 'pprvulovic@pwa.rs',
            'password' => Hash::make('123')
        ]);
    }
}
