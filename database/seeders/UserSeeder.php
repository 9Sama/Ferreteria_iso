<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->role_id = 1;
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("123qwe");
        $user->address = "admin #123";
        $user->phone = "999222111";
        $user->save();
    }
}
