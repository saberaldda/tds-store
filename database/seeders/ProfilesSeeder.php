<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id'   => '1',
            'address'   => 'Gaza',
            'gender'    => 'male',
            'birthdate' => '2001-3-8',
        ]);
        Profile::create([
            'user_id'   => '2',
            'address'   => 'Khanyouns',
            'gender'    => 'male',
            'birthdate' => '2001-3-8',
        ]);
        Profile::create([
            'user_id'   => '3',
            'address'   => 'Rafah',
            'gender'    => 'male',
            'birthdate' => '2001-3-8',
        ]);
    }
}
