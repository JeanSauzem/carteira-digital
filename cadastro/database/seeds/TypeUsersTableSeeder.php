<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_users')->insert([
            'describe' => 'Lojista'
        ]);

        DB::table('type_users')->insert([
            'describe' => 'Usuario Final'
        ]);
    }
}
