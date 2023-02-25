<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qPQHJ12HDVTPytorOAQcmO08oQM.JljE/zR38oX5s2w6ZHUPjP4oe',
                'remember_token' => 'il7x9wU3IWlFyb2p1SvswxlWTB24VUM2T5brtpDJL6fGwJu8WDRSY3iCXXdc',
                'settings' => NULL,
                'created_at' => '2023-02-25 04:26:45',
                'updated_at' => '2023-02-25 04:26:45',
            ),
        ));
        
        
    }
}