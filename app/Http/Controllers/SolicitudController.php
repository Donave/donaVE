<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\Transformers\SolicitudTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;

class SolicitudController extends Controller
{

    use Helpers;

    public function __construct()
    {
        $this->modelo = new Solicitud();
    }

    public function getSolitudesActivas($page)
    {
        $solicitudes = $this->modelo->obtenerPorEstado(true,$page);

        if($solicitudes){
            return $this->response->paginator($solicitudes,new SolicitudTransformer());
        }

        return $this->response->errorNotFound();
    }

    public function getSolitudesFinalizadas($page)
    {
        $solicitudes = $this->modelo->obtenerPorEstado(false,$page);

        if($solicitudes){
            return $this->response->paginator($solicitudes,new SolicitudTransformer());
        }

        return $this->response->errorNotFound();
    }
}
