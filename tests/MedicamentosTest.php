<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MedicamentosTest extends TestCase
{

    /**
     * @test
     *
     * Test: GET /medicamentos
     */

    public function testTodos()
    {
        $this->get('api/medicamentos',$this->headersApi())
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'nombre',
                        'laboratorio',
                        'concentracion',
                        'formaFarmacetica',
                        'titular',
                        'nombreGenerico',
                    ],
                ]
            ]);
    }

    /**
     * @Test
     *
     * Test: Get api/medicamento/{id}
     */
    public function testMedicamentosPorId()
    {
        $this->get('api/medicamento/1',$this->headersApi())
            ->seeJson([
                'data' => [
                    'id' => 1,
                    'nombre' => '3-A OFTENO 1 mg/ml SOLUCION OFTALMICA',
                    'laboratorio' => 'LABORATORIO SOPHIA S.A DE C.V',
                    'concentracion' => '1 mg/ml (A)',
                    'formaFarmacetica' => 'SOLUCION OFTALMICA',
                    'titular' => 'LABORATORIOS SOPHIA S.A DE C.V',
                    'nombreGenerico' => 'DICLOFENAC SODICO',
                ],
            ]);
    }

    public function testBuscarPorNombre()
    {
        $this->get('api/medicamentos/nombre/atame',$this->headersApi())
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'nombre',
                        'laboratorio',
                        'concentracion',
                        'formaFarmacetica',
                        'titular',
                        'nombreGenerico',
                    ],
                ]
            ]);
    }
}
