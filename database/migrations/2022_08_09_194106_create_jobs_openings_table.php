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
        Schema::create('jobs_openings', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->text('tel');
            $table->text('name_user');
            $table->text('type_job');
            $table->text('desired_position');
            $table->text('work_schedule');
            $table->text('frequency_payments')->nullable();
            $table->text('where_work')->nullable();
            $table->text('images')->nullable();
            $table->text('description');
            $table->text('from_price')->nullable();
            $table->text('before_price')->nullable();
            $table->text('when_price')->nullable();
            $table->text('adres');
            $table->text('work_experience');
            $table->text('over_years_old')->nullable();
            $table->text('from_years_old')->nullable();
            $table->text('with_violation_health')->nullable();
            $table->string('city');
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
        Schema::dropIfExists('jobs_openings');
    }
};
