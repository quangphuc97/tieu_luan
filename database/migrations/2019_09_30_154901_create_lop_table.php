<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop', function (Blueprint $table) {
            $table->integer('ma_lop',true,true);
            $table->string('ten_lop', 255);
            $table->integer('id_giao_vien')->unsigned()->nullable();
            $table->integer('si_so');
            $table->string('trang_thai', 255);
            $table->foreign('id_giao_vien')
                ->references('id_giao_vien')->on('giao_vien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop');
    }
}
