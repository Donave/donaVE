<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


$api = app('Dingo\Api\Routing\Router');

    /*
     * Rutas de API de Medicamentos
     */

    require('Routes/Api/Version1/MedicamentosApiRoutes.php');

    /*
    * Rutas de API de Solicitudes
    */

    require('Routes/Api/Version1/SolicitudesApiRoutes.php');