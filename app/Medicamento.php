<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{

    protected $table = 'medicamento';

    protected $fillable = [
        'nombre',
        'laboratorio',
        'concentracion',
        'forma_farmacetica',
        'titular',
        'nombre_generico',
    ];


    public function crearNuevo($request)
    {
        return $this->create($request);
    }

    public function buscarPorId($id)
    {
        return $this->where('id',$id)->first();
    }

    public function buscarPorNombre($nombre)
    {
        return $this->where('nombre', 'LIKE', '%' . $nombre . '%')->take(100)->get();
    }
}
