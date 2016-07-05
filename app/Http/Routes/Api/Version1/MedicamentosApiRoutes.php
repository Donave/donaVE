<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 6/28/2016
 * Time: 8:40 PM
 */

$api->version('v1',['middleware' => '\App\Http\Middleware\AccesoApi::class'], function ($api) {

        $api->get('medicamentos', 'App\Http\Controllers\MedicamentosController@getTodos');
        $api->get('medicamento/{id}', 'App\Http\Controllers\MedicamentosController@show');
        $api->get('medicamentos/nombre/{nombre}', 'App\Http\Controllers\MedicamentosController@getBuscarPorNombre');


});