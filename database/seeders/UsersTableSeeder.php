<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Vijay Chapagain',
            'email' => 'spunkytykoon1@gmail.com',
            'password' => Hash::make('yeshu4321'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'utype' => 'USR'
        ]);
        DB::table('users')->insert([
            'name' => 'Bijaya Chapagain',
            'email' => 'bijay1@gmail.com',
            'password' => Hash::make('yeshu4321'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'utype' => 'ADM'
        ]);
    }
}
