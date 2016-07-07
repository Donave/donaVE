<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Solicitud::class, function (Faker\Generator $faker) {
    return [
        'correo_electronico' => 'info@donave.com',
        'id_url' => $faker->url,
        'tipo' => 'medicamento',
        'id_elemento' => $faker->numberBetween(0,1200),
        'estado' => $faker->randomElement([true,false]),
    ];
});
