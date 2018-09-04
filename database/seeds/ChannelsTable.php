<?php

use Illuminate\Database\Seeder;

class ChannelsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Channel::create([
        'title'=>'Php'
      ]);
      App\Channel::create([
        'title'=>'Laravel'
      ]);
      App\Channel::create([
        'title'=>'Bootstrap'
      ]);
      App\Channel::create([
        'title'=>'Java'
      ]);
      App\Channel::create([
        'title'=>'Data Structures'
      ]);
      App\Channel::create([
        'title'=>'Algorithms'
      ]);
      App\Channel::create([
        'title'=>'Javascript'
      ]);
      App\Channel::create([
        'title'=>'Kotlin'
      ]);
    }
}
