<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 7/05/2016
 * Time: 8:40 PM
 */

$api->version('v1',['middleware' => '\App\Http\Middleware\AccesoApi::class'], function ($api) {

    $api->get('solicitudes/activas/{pagina}', 'App\Http\Controllers\SolicitudController@getSolitudesActivas');
    $api->get('solicitudes/finalizadas/{pagina}', 'App\Http\Controllers\SolicitudController@getSolitudesFinalizadas');
    $api->get('solicitud/{url}', 'App\Http\Controllers\SolicitudController@getSolicitudPorIdUrl');

    $api->post('solicitud','App\Http\Controllers\SolicitudController@postCrear');
});