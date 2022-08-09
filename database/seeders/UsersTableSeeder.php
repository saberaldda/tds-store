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
            'password'              => Hash::make('password'),
            'email_verified_at'     => now(),
            'profile_photo_path'    => 'https://yt3.ggpht.com/gOF3L3SvfE3IqWHEJqqnKGsrIMChK0Gv2st_gVzxP4ZtPIjcT_E_28E_1FLsWSUG1DdSAddp2A=s176-c-k-c0x00ffffff-no-rj',
            'remember_token'        => Str::random(10)
        ]);
    }
}
