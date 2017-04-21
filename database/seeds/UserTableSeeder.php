<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User([
            'name' => 'Mauricio',
            'surname' => 'Robayo',
            'email' => 'robayo.mauri@gmail.com',
            'password' => '$2y$10$rAVjXlQL1VY6IQ72o71G8.gFs9dXaOrNOBOQN25Ebe6wI4m/sroXi',
            'image_filename' => '',
            'remember_token' => '9UWxa6dJEUkoai0hhfTPZ1zQ2l78Wca82anhkwkXTdo3n5dh3s8CHv10w7ib',
            'created_at' => '2017-04-08 04:24:58',
            'updated_at' => '2017-04-10 02:23:58',
        ]);
        $user->save();   
        $user = new \App\Models\User([
            'name' => 'Maria',
            'surname' => 'Ramirez',
            'email' => 'maria.ramirezrobayo@hotmail.com',
            'password' => '$2y$10$tXrvAXIr8jSnTZ44YCIxkubYmzzXM3ia/xhgqBe9uXP/X3DqNwJUm',
            'image_filename' => '',
            'remember_token' => 'EExLOUvwdWvEWWBsbzLuN8BjhX39RJDE5loMNUxXJZdf6dzuZjVSOvPplFRA',
            'created_at' => '2017-04-12 23:20:39',
            'updated_at' => '2017-04-12 23:25:34',
        ]);
        $user->save();  
    }
}