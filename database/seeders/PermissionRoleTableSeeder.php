<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );



        //############## PEOPLE ######################
        $role = Role::where('name', 'user')->firstOrFail();
        $permissions = Permission::whereRaw('table_name = "admin" or
                                            `key` = "browse_debtors" or        
                                            `key` = "browse_clear-cache"')->get();
        $role->permissions()->sync($permissions->pluck('id')->all());
        
        
    }
}