<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInProductParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_participant', function (Blueprint $table) {
            $table->string('sumber_informasi')->nullable()->change();
            $table->string('merekomendasikan')->nullable()->change();
            $table->string('request_pelatihan')->nullable()->change();
            $table->integer('layanan_panitia_sikap')->nullable()->change();
            $table->string('layanan_panitia_sikap_komentar')->nullable()->change();
            $table->integer('layanan_panitia_kinerja_kualitas')->nullable()->change();
            $table->string('layanan_panitia_kinerja_kualitas_komentar')->nullable()->change();
            $table->string('materi')->nullable()->change();
            $table->string('materi_komentar')->nullable()->change();
            $table->text('kesan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_participant', function (Blueprint $table) {
            //
        });
    }
}
