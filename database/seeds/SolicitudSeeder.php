<?php

use App\Solicitud;
use Illuminate\Database\Seeder;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitud::where('correo_electronico','info@donave.com')->delete();
        factory(App\Solicitud::class, 100)->create();
        factory(App\Solicitud::class, 1)->create([
            'correo_electronico' => 'info@donave.com',
            'id_url' => '314577eabf9658ee',
            'tipo' => 'medicamento',
            'id_elemento' => 124,
            'estado' => true,
            'id_api_acceso' => 1
        ]);
    }
}
