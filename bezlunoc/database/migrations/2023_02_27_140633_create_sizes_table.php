<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size', 100);
            $table->decimal('price')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('sizes');
    }
};