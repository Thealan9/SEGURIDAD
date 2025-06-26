<?php

namespace Database\Seeders;

use App\Models\Space;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    public function run()
    {
        Space::create([
            'name' => 'Sala de reuniones A',
            'description' => 'Una sala de reuniones con capacidad para 10 personas.',
            'price_per_hour' => 200,
            'capacity' => 10,
        ]);

        Space::create([
            'name' => 'Oficina privada B',
            'description' => 'Espacio privado para trabajo individual.',
            'price_per_hour' => 150,
            'capacity' => 1,
        ]);
    }
}
