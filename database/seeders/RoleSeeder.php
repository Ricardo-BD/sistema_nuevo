<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crea roles solo si no existen
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $entityManagerRole = Role::firstOrCreate(['name' => 'Entity Manager']);
        $subEntityManagerRole = Role::firstOrCreate(['name' => 'Sub-Entity Manager']);
        
        // Asigna roles a usuarios de ejemplo
        $user = User::find(1); // Suponiendo que el usuario con ID 1 es el admin
        if ($user) {
            $user->assignRole($adminRole);
        }
    }

}
