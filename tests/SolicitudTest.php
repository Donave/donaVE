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
                        //'correoElectronico',
                        'url',
                        'tipo',
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

    /**
     * @test
     *
     * Test: GET /solicitudes/finalizadas/1
     */
    public function testSolicitudesFinalizadas()
    {
        $this->get('api/solicitudes/finalizadas/1',$this->headersApi())
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        //'correoElectronico',
                        'url',
                        'tipo',
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

    /**
     * @test
     *
     * Test: POST /solicitud
     */
    public function testCrearSolicitud()
    {
        $arrayCrear = [
            'correo_electronico' => 'info@donave.com',
            'id_elemento'        => 123,
        ];
        $this->post('api/solicitud',$arrayCrear,$this->headersApi())
            ->seeStatusCode(200);
    }

    /**
     * @test
     *
     * Test: POST /solicitud/{url}
     */
    public function testObtenerSolicitud()
    {

        $this->get('api/solicitud/314577eabf9658ee',$this->headersApi())
            ->seeJson([
                    'data' => [
                      //'correoElectronico' => 'info@donave.com',
                        'url' => '314577eabf9658ee',
                        'tipo' =>'medicamento',
                        'estado' => true,
                        'dataElemento' => [
                            'id' => 124,
                            'nombre' =>  'ACICLOR 1 g COMPRIMIDOS A.P.',
                            'laboratorio' =>'LABORATORIOS LETI, S.A.V.',
                            'concentracion' => '1 g (A1)',
                            'formaFarmacetica' => 'COMPRIMIDO DE ACCION PROLONGADA',
                            'titular' => 'LABORATORIOS LETI, S.A.V.',
                            'nombreGenerico' => 'ACICLOVIR'
                        ]
                    ]
            ])
            ->seeStatusCode(200);
    }

}
