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
        Schema::create('employeds', function (Blueprint $table) {
            $table->id();
            $table->string('civility');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('function');
            $table->integer('phone');
            $table->string('address');
            $table->string('category');
            $table->string('department');
            $table->string('matricule')->unique();
            $table->string('profile_image');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('employeds');
    }
};
