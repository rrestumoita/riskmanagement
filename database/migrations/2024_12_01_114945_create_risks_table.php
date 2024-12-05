<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();  // Ini otomatis membuat kolom 'id' sebagai auto-increment
            $table->string('description');
            $table->integer('severity');
            $table->integer('occurrence');
            $table->integer('detection');
            $table->integer('rpn')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('risks');
    }
}