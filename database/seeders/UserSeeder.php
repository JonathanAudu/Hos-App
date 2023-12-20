<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (User::query()->where('role', 'admin')->doesntExist()) {
            User::create([
                'user_id' => '00000',
                'role' => 'admin',
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'phone' => '08050000000',
                'gender' => 'Male',
                'dob' => null,
                'state' => 'FCT',
                'password' => bcrypt('123456')
            ]);
        }
    }
}
