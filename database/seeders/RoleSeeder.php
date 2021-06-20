<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name"=>"admin"]);
        $role2 = Role::create(["name"=>"doctor"]);
        $role3 = Role::create(["name"=>"secretaria"]);
        $role4 = Role::create(["name"=>"supervisor"]);


        Permission::create(["name"=>"admin.index",
                             "description"=>"Ingresal al menu Administrador"])->syncRoles([$role1,$role2]);

        //ESPECIALIDADES
        Permission::create(["name"=>"admin.specialities.index",
                            "description"=>"Ver especialidades"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"admin.specialities.create",
            "description"=>"Crear especialidades"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.specialities.edit",
        "description"=>"Editar especialidades"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.specialities.destroy",
        "description"=>"Eliminar especialidades"])->syncRoles([$role1]);


        //USUARIOS
        Permission::create(["name"=>"admin.users.index",
        "description"=>"Ver usuarios"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"admin.users.edit",
        "description"=>"Editar usuarios"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.users.destroy",
        "description"=>"Eliminar usuarios"])->syncRoles([$role1]);


        //DOCTORES
        Permission::create(["name"=>"admin.doctors.index",
        "description"=>"Ver doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.create",
        "description"=>"Crear doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.show",
        "description"=>"Ver horarios de doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.edit",
        "description"=>"Editar doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.destroy",
        "description"=>"Eliminar doctores"])->syncRoles([$role1]);


        //horarios
        Permission::create(["name"=>"horarios.index",
        "description"=>"Ver sus horarios (Doctor)"])->syncRoles([$role2]);

        Permission::create(["name"=>"horarios.create",
        "description"=>"Crear sus horarios (Doctor)"])->syncRoles([$role2]);


        Permission::create(["name"=>"horarios.edit",
        "description"=>"Atender Citas (Doctor)"])->syncRoles([$role2]);


        Permission::create(["name"=>"horarios.show",
        "description"=>"Ver sus Citas (Doctor)"])->syncRoles([$role2]);

        Permission::create(["name"=>"horarios.destroy",
        "description"=>"Borrar sus Horarios vacios (Doctor)"])->syncRoles([$role2]);


        //ROLES Y PERMISOS
        Permission::create(["name"=>"admin.roles.index",
        "description"=>"Ver roles"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"admin.roles.create",
        "description"=>"Crear roles"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.roles.edit",
        "description"=>"Editar roles"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.roles.destroy",
        "description"=>"Eliminar roles"])->syncRoles([$role1]);

    }
}
