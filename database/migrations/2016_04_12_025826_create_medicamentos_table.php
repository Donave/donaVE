<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('laboratorio');
            $table->string('concentracion');
            $table->string('forma_farmacetica');
            $table->string('titular');
            $table->string('nombre_generico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicamento');
    }
}
