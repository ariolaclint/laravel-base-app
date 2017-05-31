<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}


class UsersTableSeeder extends Seeder {

    public function run()
    {
    	$user  = new User();
    	$user->firstname = "Clint";
    	$user->lastname	= "Ariola";
        $user->username = "clintariola";
        $user->mobileno = "09208066350";
    	$user->email = "admin@gmail.com";
    	$user->password = bcrypt("121212");
    	$user->role = "R01";
    	$user->active = 1;
    	$user->save();
    }

}
