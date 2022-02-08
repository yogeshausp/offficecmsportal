<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 2,
            'department'=>'medical',
            'password' => Hash::make('user@123'),
        ]);
    }
}
