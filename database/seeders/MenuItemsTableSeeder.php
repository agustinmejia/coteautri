<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Inicio',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-house',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-28 03:58:02',
                'route' => 'voyager.dashboard',
                'parameters' => 'null',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:08:02',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 14,
                'order' => 1,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:07:52',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 14,
                'order' => 2,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:07:56',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Herramientas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-27 18:27:18',
                'route' => NULL,
                'parameters' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:07:47',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:07:47',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:07:47',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-26 17:08:02',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Configuración',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2023-02-25 04:00:55',
                'updated_at' => '2023-02-27 18:27:18',
                'route' => 'voyager.settings.index',
                'parameters' => 'null',
            ),
            10 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Seguridad',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2023-02-26 17:07:44',
                'updated_at' => '2023-02-27 18:27:18',
                'route' => NULL,
                'parameters' => '',
            ),
            11 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Personas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-people',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2023-02-26 17:18:30',
                'updated_at' => '2023-02-26 20:31:08',
                'route' => 'voyager.people.index',
                'parameters' => NULL,
            ),
            12 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Telefonia',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-phone',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2023-02-26 20:31:01',
                'updated_at' => '2023-02-26 20:31:08',
                'route' => 'telephony.index',
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Reportes',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-regular fa-file-lines',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2023-02-27 18:17:24',
                'updated_at' => '2023-02-27 18:28:23',
                'route' => NULL,
                'parameters' => '',
            ),
            14 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Descarga Archivos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-print',
                'color' => '#000000',
                'parent_id' => 17,
                'order' => 1,
                'created_at' => '2023-02-27 18:26:52',
                'updated_at' => '2023-02-27 18:27:31',
                'route' => 'print.download',
                'parameters' => 'null',
            ),
            15 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Usuarios Auth',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-print',
                'color' => '#000000',
                'parent_id' => 17,
                'order' => 2,
                'created_at' => '2023-02-27 19:47:26',
                'updated_at' => '2023-02-27 19:47:33',
                'route' => 'print.auth',
                'parameters' => NULL,
            ),
            16 => 
            array (
                'id' => 20,
                'menu_id' => 1,
                'title' => 'Limpiar cache',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-refresh',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2023-02-28 14:36:15',
                'updated_at' => '2023-02-28 14:36:15',
                'route' => 'cache.clar',
                'parameters' => NULL,
            ),
        ));
        
        
    }
}