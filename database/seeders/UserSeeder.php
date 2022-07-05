<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                "name"=>"Operario",
                "email"=> "operario@mail.com",
                "password"=>bcrypt('1234')
            ],
            [
                "name"=>"Gestor",
                "email"=> "gestor@mail.com",
                "password"=>bcrypt('1234')
            ]
        ]);
    }
}
