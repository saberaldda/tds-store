<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'                  => 'Saber',
            'email'                 => 'saber@tds.com',
            'type'                  => 'super-admin',
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => '',
            'remember_token'        => Str::random(10)
        ]);
        User::create([
            'name'                  => 'admin',
            'email'                 => 'admin@tds.com',
            'type'                  => 'super-admin',
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => '',
            'remember_token'        => Str::random(10)
        ]);User::create([
            'name'                  => 'user',
            'email'                 => 'user@tds.com',
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => '',
            'remember_token'        => Str::random(10)
        ]);
        User::create([
            'name'                  => 'Ahmad',
            'email'                 => 'ahmad@tds.com',
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => '',
            'remember_token'        => Str::random(10)
        ]);
        User::create([
            'name'                  => 'Qassam',
            'email'                 => 'qassam@tds.com',
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => '',
            'remember_token'        => Str::random(10)
        ]);
    }
}
