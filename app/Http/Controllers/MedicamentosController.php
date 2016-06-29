<?php

namespace App\Http\Controllers;

use App\Medicamento;
use App\Transformers\MedicamentoTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class MedicamentosController extends Controller
{

    use Helpers;


    public function __construct()
    {
        $this->modelo = new Medicamento();
    }


    public function getTodos()
    {
        $respuesta = $this->modelo->all();

        if($respuesta){
            return $this->collection($respuesta, new MedicamentoTransformer());
        }

        return $this->response->errorInternal();
    }

    public function show($id)
    {
        $respuesta = $this->modelo->buscarPorId($id);

        if($respuesta){
            return $this->item($respuesta, new MedicamentoTransformer());
        }

        return $this->response->errorNotFound();
    }

    public function getBuscarPorNombre($nombre)
    {
        $respuesta = $this->modelo->buscarPorNombre($nombre);

        if($respuesta){
            return $this->collection($respuesta, new MedicamentoTransformer());
        }

        return $this->response->errorInternal();
    }
}
