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
    }
}
