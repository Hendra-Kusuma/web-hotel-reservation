<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name'=>'admin-permission']);
        Permission::create(['name'=>'user-permission']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'user']);
    }
}
