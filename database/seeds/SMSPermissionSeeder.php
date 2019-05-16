<?php

use Illuminate\Database\Seeder;

class SMSPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Permission::create(['name'=>'Send SMS', 'permission' => 'send-sms']);
    }
}
