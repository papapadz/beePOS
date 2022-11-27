<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_prices', function (Blueprint $table) {
            $table->bigIncrements('price_id');
            $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('product_id')->on('tbl_products')->onDelete('cascade');
            $table->double('unit_cost',11,2);
            $table->double('unit_price',11,2);
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
        Schema::dropIfExists('tbl_product_prices');
    }
}
