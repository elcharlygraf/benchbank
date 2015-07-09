<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use HireMe\Entities\Users;

class UserTableSeeder extends Seeder {

	public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'password' => \Hash::make('123456'),
                    'email' => 'carlox16@gmail.com',
                    'idrol' => 1
                ),
                array(
                    'password' => \Hash::make('123456'),
                    'email' => 'inspiraaccion@gmail.com',
                    'idrol' => 1
                )
            ));
    }

}