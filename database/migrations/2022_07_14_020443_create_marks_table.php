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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->text('user');
            $table->text('marka');
            $table->text('model');
            $table->text('year');
            $table->text('body_type');
            $table->text('gen');
            $table->text('engine_type');
            $table->text('drive');
            $table->text('transmission');
            $table->text('horse_power');
            $table->text('mileage');
            $table->text('gas_cylinder')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('marks');
    }
};
