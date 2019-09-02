<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('ma_san_pham',true,true);
            $table->string('ten_san_pham', 255);
            $table->string('dien_giai', 255);
            $table->integer('gia');
            $table->integer('ma_loai')->unsigned()->nullable();
            $table->binary('anh_dai_dien')->nullable();
            $table->timestamps();
            $table->foreign('ma_loai')
                ->references('ma_loai')->on('loai_san_pham')
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
        Schema::dropIfExists('san_pham');
    }
}
