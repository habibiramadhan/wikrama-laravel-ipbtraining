<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_participant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('participant_id');
            $table->string('sumber_informasi');
            $table->string('merekomendasikan');
            $table->string('request_platihan');
            $table->integer('layanan_panitia_sikap');
            $table->string('layanan_panitia_sikap_komentar');
            $table->integer('layanan_panitia_kinerja_kualitas');
            $table->string('layanan_panitia_kinerja_kualitas_komentar');
            $table->string('materi');
            $table->string('materi_komentar');
            $table->text('kesan');
            $table->timestamps();

            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('product_id')->references('id')->on('products');
        
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_participant');
    }
}
