<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anh', function (Blueprint $table) {
            $table->increments('ma_anh',true,true);
            $table->string('dia_chi', 255);
            $table->integer('ma_san_pham')->unsigned()->nullable();
            $table->foreign('ma_san_pham')
                ->references('ma_san_pham')->on('san_pham')
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
        Schema::dropIfExists('anh');
    }
}
