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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('what_i_sell');
            $table->text('sell_and_buy');
            $table->text('adres');
            $table->text('who_add');
            $table->text('images')->nullable();
            $table->text('description');
            $table->text('garage_type')->nullable();
            $table->text('square')->nullable();
            $table->text('price');
            $table->text('city');
            $table->text('status');
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
        Schema::dropIfExists('garages');
    }
};
