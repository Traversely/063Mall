<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('admin')->insert([
            'id' => NULL,
            'name' => 'root',
            'pass' =>md5('root'),
            'auth' => 1,
            'nickName' => '超级管理员',
            'photo' => NULL,
        ]);
    }
}
