<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = 'michaelgudowski@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
    }

}