<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entity;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $root = Entity::create(['name' => 'Abafon root']);

        $entity1 = $root->children()->create(['name' => 'Entity (Branding) 1']);
        $entity2 = $root->children()->create(['name' => 'Entity (Branding) 2']);
        // Continúa creando las demás entidades según la estructura de la imagen
    }
}
