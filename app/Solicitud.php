<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Solicitud extends Model
{
    protected $table = 'solicitud';

    protected $fillable = [
        'correo_electronico',
        'id_url',
        'tipo',
        'id_elemento',
        'estado'];

    public function obtenerPorEstado($estado,$page)
    {
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        return $this->where('estado',$estado)->paginate(25);
    }

    public function crearNuevo($request)
    {
        return $this->create($request);
    }
}
