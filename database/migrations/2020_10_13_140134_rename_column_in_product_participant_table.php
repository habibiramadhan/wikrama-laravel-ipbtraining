<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInProductParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_participant', function (Blueprint $table) {
            $table->renameColumn('request_platihan', 'request_pelatihan');
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
            $table->renameColumn('request_platihan', 'request_pelatihan');
        });
    }
}
