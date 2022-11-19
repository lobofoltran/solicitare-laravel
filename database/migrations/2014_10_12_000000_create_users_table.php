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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('matricula')->nullable();
            $table->string('email')->unique();
            $table->boolean('sysadm')->nullable();
            $table->boolean('admin')->nullable();
            $table->boolean('func')->nullable();
            $table->string('password');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
