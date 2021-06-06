<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReversesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reverses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('materials');
            $table->unsignedBigInteger('borrow_id')->nullable();
            $table->foreign('borrow_id')->references('id')->on('borrows')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reverses');
    }
}
