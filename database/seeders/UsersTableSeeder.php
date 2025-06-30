<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Paul Lema',
            'email' => 'paul.16.lema@gmail.com',
            'password' => bcrypt('Paul.16@.'),
            'cedula' => '1723479349',
            'address' => 'Cotocollao',
            'phone' => '+593987433231',
            'role' => 'admin',

        ]);

        User::factory(50)->create();
    }
}
