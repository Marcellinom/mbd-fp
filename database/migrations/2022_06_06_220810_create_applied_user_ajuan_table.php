<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedUserAjuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_user_ajuan', function (Blueprint $table) {
            $table->uuid('ajuan_id')->index();
            $table->uuid('user_id');

            $table->foreign('ajuan_id')->references('id')->on('ajuan');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applied_user_ajuan');
    }
}
