<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('trainer_id');
            $table->string('penyampaian_rating');
            $table->text('komentar');
            $table->timestamps();

            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('trainer_id')->references('id')->on('trainers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainer_ratings');
    }
}
