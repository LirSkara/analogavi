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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('name');
            $table->string('state');
            $table->text('description');
            $table->text('price');
            $table->text('tel');
            $table->text('name_user');
            $table->text('images');
            $table->text('marka');
            $table->text('type_doc');
            $table->text('owner_count');
            $table->text('when_pur_year')->nullable();
            $table->text('when_pur_month')->nullable();
            $table->text('year_graduation')->nullable();
            $table->text('month_graduation')->nullable();
            $table->text('state_number')->nullable();            
            $table->string('vin')->nullable();
            $table->string('ctc')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('cars');
    }
};
