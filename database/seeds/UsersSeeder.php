<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('T_Users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$LVV6vC/yMvO1Nih0F7V3d.7OsR8EeZka0dld6rBYJtA3IuZVGE3W6',
            'email' => 'admin@admin.com',
            'nama' => 'Administrator',
            'remember_token' => NULL,
        ]);
    }
}
