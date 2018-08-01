<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'admin' => 'Administrator',
            'address' => 'Kalunasan Cebu City',
            'contact_no' => 13,
            'username' => 'admin',
            'email' => 'ipaque@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
