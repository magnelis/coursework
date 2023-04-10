<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('working_days');
    }
};
