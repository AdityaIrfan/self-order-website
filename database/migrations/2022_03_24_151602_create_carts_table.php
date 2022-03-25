<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ip');
            $table->enum('consume_method', array('dine in', 'take away'))->nullable();
            $table->integer('table')->nullable();
            $table->string('name')->nullable();
            $table->enum('payment_method', array('cash', 'cashless'))->nullable();
            $table->integer('tax')->nullable();
            $table->float('price')->nullable();
            $table->float('total_price')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
