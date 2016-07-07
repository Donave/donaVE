<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 6/28/2016
 * Time: 9:17 PM
 */

namespace App\Transformers;

use App\Medicamento;
use App\Solicitud;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use League\Fractal\TransformerAbstract;

class SolicitudTransformer extends TransformerAbstract
{
    use Helpers;

    public function transform(Solicitud $solicitud)
    {
        $medicamento    = new Medicamento();
        $medicamentoT   = new MedicamentoTransformer();
        $dataElemento   =  $medicamentoT->transform($medicamento->buscarPorId($solicitud->id_elemento));
        return [
            'correoElectronico' => $solicitud->correo_electronico,
            'url' => $solicitud->id_url,
            'tipo' => $solicitud->tipo,
            'elemento' => $solicitud->elemento,
            'estado' => $solicitud->estado,
            'dataElemento' => $dataElemento
        ];
    }
}