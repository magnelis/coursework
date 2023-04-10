<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('date_id')->unsigned();
            $table->bigInteger('time_id')->unsigned();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('size_id')->constrained('sizes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('style_id')->constrained('styles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->constrained('statuses')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
};
