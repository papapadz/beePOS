<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->bigIncrements('sales_id');
            $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('product_id')->on('tbl_products')->onDelete('cascade');
            $table->integer('qty')->default(1);
            $table->unsignedBigInteger('price_id');
                $table->foreign('price_id')->references('price_id')->on('tbl_product_prices')->onDelete('cascade');
            $table->double('discount_amount',11,2)->default(0);
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('tbl_users')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_sales');
    }
}
