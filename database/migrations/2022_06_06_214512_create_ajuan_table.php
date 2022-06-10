<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajuan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_event');
            $table->uuid('user_id_pengaju');
            $table->uuid('region_id');
            $table->enum('status', ['Accepted', 'Waiting for Quota Fill', 'Rejected']);
            $table->integer('minimal_volunteer');
            $table->integer('minimal_tanaman');
            $table->integer('minimal_transporter');
            $table->timestamp('time_limit');
            $table->boolean('is_eligible')->default(false);

            $table->foreign('user_id_pengaju')->references('id')->on('user');
            $table->foreign('region_id')->references('id')->on('region');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajuan');
    }
}
