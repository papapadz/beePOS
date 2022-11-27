<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->unsignedBigInteger('perk_id')->nullable();
            $table->enum('is_pad',[0,1,2,3])->default(0);
            $table->float('cash_tendered',10,2);
            $table->enum('is_paid',[1,2,3])->default(1);
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
        Schema::dropIfExists('tbl_transactions');
    }
}
