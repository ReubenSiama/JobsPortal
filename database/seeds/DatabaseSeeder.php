<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => 2,
            'contact' => 0,
            'date_of_birth' => '1995/09/04',
            'password' => bcrypt('secret'),
        ]);
        DB::table('roles')->insert([
            'role_name'=>'User'
        ]);
        DB::table('roles')->insert([
            'role_name'=>'Admin'
        ]);
    }
}
