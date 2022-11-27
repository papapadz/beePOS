<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name',255);
            $table->unsignedBigInteger('product_category');
                $table->foreign('product_category')->references('product_category_id')->on('tbl_product_categories')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->string('description',255);
            $table->string('img_file',255)->default(asset('assets/img/default.jpg'));
            $table->unsignedBigInteger('company_id');
                $table->foreign('company_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_products');
    }
}
