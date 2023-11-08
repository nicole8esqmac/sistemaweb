<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_inicial_admins', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idEmpresa')->references('id')->on('empresa_admins')->cascadeOnDelete();
            $table->string('descripcion');
            $table->decimal('total', $precision = 15, $scale = 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo_inicial_admins');
    }
};
