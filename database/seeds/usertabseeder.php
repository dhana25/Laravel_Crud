<?php

use Illuminate\Database\Seeder;
use App\User;

class usertabseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([

        	'name'  => 'test',
        	'email' => 'test@gmail.com',
        	'password' => Hash::make('1234')

        ]);
    }
}
