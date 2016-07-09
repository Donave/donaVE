<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Scalar\String_;

class Solicitud extends Model
{
    protected $table = 'solicitud';

    protected $fillable = [
        'correo_electronico',
        'id_url',
        'tipo',
        'id_elemento',
        'estado',
        'id_api_acceso'];

    public function obtenerPorEstado($estado, $page)
    {
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        return $this->where('estado', $estado)->paginate(25);
    }

    public function crearNuevo($request)
    {
        return $this->create($request);
    }

    public function setSolicitudEstado()
    {
        $this->attributes['estado'] = true;
    }

    public function setSolicitudTipoMedicamento()
    {
        $this->attributes['tipo'] = 'medicamento';
    }

    public function setSolicitudUrl()
    {
        $stringUrl = uniqid($this->id);
        $this->attributes['id_url'] = $stringUrl;
    }

    public function obtenerPorUrl($data)
    {
        return $this->where("id_url",$data)->first();
    }

    public function apiAcceso()
    {
        return $this->belongsTo('App/ApiAcceso','id_api_acceso');
    }

}
