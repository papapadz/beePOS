<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->unsignedBigInteger('shop_id');
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
                $table->foreign('role_id')->references('id')->on('user_roles')->onDelete('cascade');
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
        Schema::dropIfExists('affiliations');
    }
}
