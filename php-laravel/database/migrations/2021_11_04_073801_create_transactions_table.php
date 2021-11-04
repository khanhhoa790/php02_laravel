<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 191);
            $table->string('title', 191);
            $table->string('reference', 191);
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('transfer_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sale_id');
            $table->decimal('amount', 10, 2);
             $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods');
             $table->foreign('provider_id')
                ->references('id')
                ->on('providers');
            $table->foreign('sale_id')
                ->references('id')
                ->on('sales');
            $table->foreign('transfer_id')
                ->references('id')
                ->on('transfers');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('transactions');
    }
}
