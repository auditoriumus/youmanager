<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->jsonb('menu')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_payed')->default(false);
            $table->unsignedBigInteger('pay_types_id')->default(1);
            $table->foreign('pay_types_id')
                ->references('id')
                ->on('pay_types');
            $table->float('price')->default(0.00);
            $table->integer('discount')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
