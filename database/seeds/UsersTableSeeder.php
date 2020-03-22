<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Admin',
            'email' => 'admin@blog.loc',
            'password' => bcrypt('abc123456'),
            'role' => 'admin'
        ]);

        factory(App\User::class, 10)->create();
    }
}
