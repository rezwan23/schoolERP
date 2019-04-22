<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
        \App\Models\Permission::insert([
            ['name'=>'Student Crud', 'permission'=>'student-crud'],
            ['name'=>'Teacher Crud', 'permission'=>'teacher-crud'],
            ['name'=>'Class Crud', 'permission'=>'class-crud'],
            ['name'=>'Librarian Crud', 'permission'=>'librarian-crud'],
            ['name'=>'Time Table Crud', 'permission'=>'time-table-crud'],
            ['name'=>'Fee Crud', 'permission'=>'fee-crud'],
            ['name'=>'Book Crud', 'permission'=>'book-crud'],
            ['name'=>'Assignment Crud', 'permission'=>'assignment-crud'],
            ['name'=>'Attendance Crud', 'permission'=>'attendance-crud'],
            ['name'=>'Result Crud', 'permission'=>'result-crud'],
            ['name'=>'Book Issue Crud', 'permission'=>'book-issue-crud'],
            ['name'=>'Set Permission', 'permission'=>'set-permission'],
            ['name'=>'Event Crud', 'permission'=>'event-crud'],
        ]);
        $permissions = \App\Models\Permission::all()->pluck('id');
        $role = \App\Models\Role::create(['name'=>'Super Admin']);
        $role->permissions()->attach($permissions);
        \App\User::create([
            'name'  =>  'Super Admin',
            'email' =>  'admin@admin.com',
            'password'  =>  \Illuminate\Support\Facades\Hash::make('12345678'),
            'role_id'   =>  $role->id,
            'status'    => 1,
            'photo' =>  'photo.jpg',
        ]);

    }
}
