<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit posts']);

        $admin_role = Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $admin_role->givePermissionTo('edit posts');
    }
}
