<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SolicitudTest extends TestCase
{
    /**
     * @test
     *
     * Test: GET /solicitudes/activas/1
     */

    public function testSolicitudesActivas()
    {
        $this->get('api/solicitudes/activas/1',$this->headersApi())
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'correoElectronico',
                        'url',
                        'tipo',
                        'elemento',
                        'estado',
                        'dataElemento' => [
                            'id',
                            'nombre',
                            'laboratorio',
                            'concentracion',
                            'formaFarmacetica',
                            'titular',
                            'nombreGenerico',
                        ],
                    ],
                ]
            ])
            ->seeStatusCode(200);
    }

    public function testSolicitudesFinalizadas()
    {
        $this->get('api/solicitudes/finalizadas/1',$this->headersApi())
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'correoElectronico',
                        'url',
                        'tipo',
                        'elemento',
                        'estado',
                        'dataElemento' => [
                            'id',
                            'nombre',
                            'laboratorio',
                            'concentracion',
                            'formaFarmacetica',
                            'titular',
                            'nombreGenerico',
                        ],
                    ],
                ]
            ])
            ->seeStatusCode(200);
    }


}
