<?php

use Illuminate\Database\Seeder;

class r extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([[
            'name'  =>  'Teacher',
        ],[
            'name'  =>  'Librarian',
        ],[
            'name'  =>  'Student'
        ]]);
    }
}
