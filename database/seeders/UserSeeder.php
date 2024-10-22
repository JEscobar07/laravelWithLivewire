<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Container\Attributes\DB;
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

        //Option 1
        $user = new User();
        $user->name = "Administrador";
        $user->email = "admin@example.com";
        $user->password = Hash::make('password');
        $user->save();

        //Or  option 2

        // DB::table('users')->insert([
        //     'name' => "Administrador",
        //     'email' => "admin@example.com",
        //     'password' => Hash::make('password'),
        // ]);
    }
}
