<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users_list = collect($this->getUsersList());

        $users_list->each(function($data, $key){
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'contact' => $data['contact'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $user->assignRole($data['role']);
        });
    }

    public function getUsersList()
    {
        return [
            [
                'last_name' => 'Admin',
                'first_name' => 'Super',
                'contact' => '+22967710659',
                'email' => 'stephaneassocle@gmail.com',
                'password' => 'password',
                'role' => 'super_admin',
            ],[
                'last_name' => 'Admin',
                'first_name' => 'Super',
                'contact' => '+22941606388',
                'email' => 'mensste30@gmail.com',
                'password' => 'password',
                'role' => 'admin',
            ],[
                'last_name' => 'Talent',
                'first_name' => 'Talent',
                'contact' => '+22967710658',
                'email' => 'mensste31@gmail.com',
                'password' => 'password',
                'role' => 'talent',
            ],
        ];
    }
}
