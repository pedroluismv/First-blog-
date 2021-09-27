<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pedro Luis Maestre Vargas',
            'email' => 'pedroluis956@gmail.com',
            'password' => bcrypt('12345789'),
        ])->assignRole('Admin');

        User::factory(99)->create();
    }
}
