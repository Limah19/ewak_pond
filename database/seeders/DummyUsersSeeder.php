<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Ewak Pond',
                'email'=>'ewakpond@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Laras',
                'email'=>'laras@gmail.com',
                'role'=>'pengguna',
                'password'=>bcrypt('654321')
            ],
            
        ];
        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
