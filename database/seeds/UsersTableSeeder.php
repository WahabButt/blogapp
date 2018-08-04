<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'simple',
            'email' => 'simple@simple.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('roles')->insert([
            'user_id' => '1',
            'role' => 'admin',
        ]);

        DB::table('roles')->insert([
            'user_id' => '2',
            'role' => 'simple',
        ]);

    }
}
