<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitudRequest;
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

    public function postCrear(SolicitudRequest $request)
    {
        $solicitud =    $this->modelo->crearNuevo($request->all());
        if($solicitud){
            $solicitud->setSolicitudEstado();
            $solicitud->setSolicitudTipoMedicamento();
            $solicitud->setSolicitudUrl();
            return $this->response->item($solicitud, new SolicitudTransformer());
        }

        return $this->response->errorBadRequest();
    }

    public function getSolicitudPorIdUrl($url)
    {
        $solicitud = $this->modelo->obtenerPorUrl($url);

        if($solicitud){
            return  $this->response->item($solicitud, new SolicitudTransformer());
        }

        return  $this->response->errorNotFound();
    }

}
