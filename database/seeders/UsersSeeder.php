<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $userData = [
        //     [
        //         'name' => 'Admin',
        //         'username' => 'admin',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('1234'),
        //         'is_admin' => 0,
        //     ],
        //     [
        //         'name' => 'Officer',
        //         'username' => 'officer',
        //         'email' => 'officer@officer.com',
        //         'password' => bcrypt('1234'),
        //         'is_admin' => 0,
        //     ],
        //     [
        //         'name' => 'Visitor',
        //         'username' => 'visitor',
        //         'email' => 'visitor@visitor.com',
        //         'password' => bcrypt('1234'),
        //         'is_admin' => 1,
        //     ],
        // ];

        // foreach ($userData as $key => $val) {
        //     User::create($val);
        // }

        User::factory()->count(2)->sequence(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234'),
                'is_admin' => 0,
            ],
            [
                'name' => 'Officer',
                'username' => 'officer',
                'email' => 'officer@officer.com',
                'password' => bcrypt('1234'),
                'is_admin' => 0,
            ],
        )->create();
        User::factory()->count(5)->create();
    }
}