<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();

            $table->string('link');
            $table->string('hash', 8)->unique();
            //$table->uuid('hash2');
            $table->integer('limit');
            $table->boolean('unlimited')->default(0);
            $table->integer('lifetime');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('links');
    }
};
