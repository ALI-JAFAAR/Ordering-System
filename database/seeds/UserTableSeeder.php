<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
class UserTableSeeder extends Seeder{

    public function run(){
        User::create([
            'name'           =>  'ALI JAAFAR',
            'email'          =>  'alijafaar0@gmail.com',
            'password'       =>  Hash::make('ALIQASWER098'),
            'type'			 =>  0,
            'remember_token' =>  Str::random(10)
        ]);        
    }
}
