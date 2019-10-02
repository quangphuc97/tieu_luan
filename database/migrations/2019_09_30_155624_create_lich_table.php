<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich', function (Blueprint $table) {
            $table->integer('id',true,true);
            $table->integer('ma_lop')->unsigned()->nullable();
            $table->dateTime('bat_dau');
            $table->dateTime('ket_thuc');
            $table->foreign('ma_lop')
                ->references('ma_lop')->on('lop')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('lich');
    }
}
