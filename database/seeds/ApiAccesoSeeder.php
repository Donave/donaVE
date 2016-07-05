<?php

use App\ApiAcceso;
use Illuminate\Database\Seeder;

class ApiAccesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apiAcceso = new ApiAcceso();

        $dataCrear = [
            'nombre_cliente'    => 'DonaVE',
            'token_acceso'      => env('ACCESO_TOKEN_DONAVE'),
            'estado'            => true
        ];

        $apiAcceso->crearNuevo($dataCrear);
    }
}
