<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdApiAutorizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud', function (Blueprint $table) {
            $table->integer('id_api_acceso')->unsigned();
            $table->foreign('id_api_acceso')
                ->references('id')
                ->on('api_acceso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud', function (Blueprint $table) {
            $table->removeColumn('id_api_acceso');
        });

    }
}
