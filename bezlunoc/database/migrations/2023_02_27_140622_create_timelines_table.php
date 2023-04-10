<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->boolean('freely')->default(0);

            $table->foreignId('date_id')->constrained('working_days')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('time_id')->constrained('working_times')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timelines');
    }
};
