<?php

use App\Models\Empresas;
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
        Schema::create('tipos_solics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type');
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
        Schema::dropIfExists('tipos_solics');
    }
};
