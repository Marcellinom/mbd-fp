<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('transaction_type', ['Tree Supplied', 'Tree Transported']);
            $table->uuid('sender');
            $table->uuid('ajuan_event_receiver');
            $table->float('price');
            $table->float('amount');

            $table->foreign('sender')->references('id')->on('user');
            $table->foreign('ajuan_event_receiver')->references('id')->on('ajuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
