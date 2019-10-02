<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ma_lop')->unsigned()->nullable();
            $table->integer('id_hoc_vien')->unsigned()->nullable();
            $table->string('trang_thai', 255);
            $table->foreign('ma_lop')
                ->references('ma_lop')->on('lop')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_hoc_vien')
                ->references('id_hoc_vien')->on('hoc_vien')
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
        Schema::dropIfExists('hoc');
    }
}
