<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perk_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('card_num',20)->unique();
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->unsignedBigInteger('shop_id');
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->float('points',10,2)->default(0);
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
        Schema::dropIfExists('perk_cards');
    }
}
