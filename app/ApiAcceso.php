<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApiAcceso extends Model
{
    use SoftDeletes;

    protected $table = 'api_acceso';

    protected $fillable = [
        'nombre_cliente',
        'token_acceso',
        'estado',
    ];

    protected $dates = ['soft_delete'];

    public function crearNuevo($data)
    {
        return $this->create($data);
    }

    public function tokenValido($token)
    {
        return $this->where('token_acceso',$token)->first();
    }
}
