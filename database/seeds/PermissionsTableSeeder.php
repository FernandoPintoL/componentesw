<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//users
        Permission::create([
            'name' => 'Navegar usuario',
            'slug' => 'usuario.index',
            'description' => 'Lista y navega todos los usuario del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de los usuario',
            'slug' => 'usuario.show',
            'description' => 'Ver los datos del rol',
        ]);

        Permission::create([
            'name' => 'Editar usuario',
            'slug' => 'usuario.edit',
            'description' => 'Edita los usuario',
        ]);

        Permission::create([
            'name' => 'Editar usuario',
            'slug' => 'usuario.create',
            'description' => 'Edita los usuario',
        ]);

        Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'usuario.destroy',
            'description' => 'Elimina datos de los usuario',
        ]);
        //roles
        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'rol.index',
            'description' => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name' => 'Ver detalles de los roles',
            'slug' => 'rol.show',
            'description' => 'Ver los datos del rol',
        ]);

        Permission::create([
            'name' => 'Editar roles',
            'slug' => 'rol.edit',
            'description' => 'Edita los roles',
        ]);

        Permission::create([
            'name' => 'Editar roles',
            'slug' => 'rol.create',
            'description' => 'Edita los roles',
        ]);

        Permission::create([
            'name' => 'Eliminar roles',
            'slug' => 'rol.destroy',
            'description' => 'Elimina datos de los roles',
        ]);
    }
}
