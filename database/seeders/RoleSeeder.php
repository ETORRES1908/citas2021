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
                            "description"=>"Ver Especilidades"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"admin.specialities.edit",
        "description"=>"Editar Especilidades"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.specialities.create",
        "description"=>"Crear Especilidades"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.specialities.destroy",
        "description"=>"Eliminar Especilidades"])->syncRoles([$role1]);

        //USUARIOS
        Permission::create(["name"=>"admin.users.index",
        "description"=>"Ver Usuarios"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"admin.users.edit",
        "description"=>"Editar Usuarios"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.users.destroy",
        "description"=>"Eliminar Usuarios"])->syncRoles([$role1]);


        //DOCTORES
        Permission::create(["name"=>"admin.doctors.index",
        "description"=>"Ver Doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.edit",
        "description"=>"Editar Doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.show",
        "description"=>"Ver Horarios de Doctores"])->syncRoles([$role1]);

        Permission::create(["name"=>"admin.doctors.destroy",
        "description"=>"Eliminar Doctores"])->syncRoles([$role1]);


        //HORARIOS
        Permission::create(["name"=>"horarios.index",
        "description"=>"Ver sus Horarios (Doctor)"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"horarios.edit",
        "description"=>"Atender Citas (Doctor)"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"horarios.create",
        "description"=>"Crear sus Horarios (Doctor)"])->syncRoles([$role1,$role2]);

        Permission::create(["name"=>"horarios.show",
        "description"=>"Ver sus Citas (Doctor)"])->syncRoles([$role1,$role2]);



    }
}
