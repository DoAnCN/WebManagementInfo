<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            [
                'id'=>1,
                'username' => 'User 1',
                'level' => 0,
                'password' => bcrypt('123456'),
                'created_at'=> new DateTime()
            ],
            [
               'id'=>2,
                'username' => 'User 2',
                'level' => 0,
                'password' => bcrypt('123456'),
                'created_at'=> new DateTime()
            ],
            [
                'id'=>3,
                'username' => 'User 3',
                'level' => 0,
                'password' => bcrypt('123456'),
                'created_at'=> new DateTime()
            ],
            [
                'id'=>4,
                'username' => 'Admin',
                'level' => 1,
                'password' => bcrypt('123456'),
                'created_at'=> new DateTime()
            ]
        ]
    );
    }
}
