<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'site settings',
            'read roles',
            'create roles',
            'edit roles',
            'delete roles',
            'read user',
            'create user',
            'edit user',
            'delete user',
            'read categories',
            'create categories',
            'edit categories',
            'delete categories',
            'read products',
            'create products',
            'edit products',
            'delete products',
            'read contactus',
            'delete contactus',
        ];
        foreach ($permissions as $row){
            Permission::create(['name'=>$row]);
        }
    }
}
