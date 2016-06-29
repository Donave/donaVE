<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 6/28/2016
 * Time: 9:17 PM
 */

namespace App\Transformers;

use App\Medicamento;
use League\Fractal\TransformerAbstract;

class MedicamentoTransformer extends TransformerAbstract
{
    public function transform(Medicamento $medicamento)
    {
        return [
            'id' => (int)$medicamento->id,
            'nombre' => ucfirst($medicamento->nombre),
            'laboratorio' => ucfirst($medicamento->laboratorio),
            'concentracion' => ucfirst($medicamento->concentracion),
            'formaFarmacetica' => $medicamento->forma_farmacetica,
            'titular' => ucfirst($medicamento->titular),
            'nombreGenerico' => ucfirst($medicamento->nombre_generico),
        ];
    }
}