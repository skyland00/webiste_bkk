<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'      =>  'admin',
                'email'     =>  'admin@admin.com',
                'role'      =>  'admin',
                'password'  =>  bcrypt('123456')
            ],

            [
                'name'      =>  'perusahaan',
                'email'     =>  'perusahaan@email.com',
                'role'      =>  'perusahaan',
                'password'  =>  bcrypt('123456')
            ],

            [
                'name'      =>  'pelamar',
                'email'     =>  'pelamar@pelamar.com',
                'role'      =>  'pelamar',
                'password'  =>   bcrypt('123456')
            ],

        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
