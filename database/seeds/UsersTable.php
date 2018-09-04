<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name'=>'admin',
          'password'=>bcrypt('admin'),
          'email'=>'vivek@gmail.com',
          'admin'=>1,
          'avatar'=>asset('avatars/avatar.jpg')
        ]);
    }
}
