<?php

use App\Models\Setores;
use App\Models\TiposSolic;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('setor_id')->references('id')->on('setores')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tipo_id')->references('id')->on('tipos_solics')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('description')->nullable();
            $table->string('situation');
            $table->date('expires_at');
            $table->foreignId('accepted_by')->nullable()->references('id')->on('users');
            $table->timestamp('accepted_in')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
