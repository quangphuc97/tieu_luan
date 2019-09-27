<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_vien', function (Blueprint $table) {
            $table->integer('id_hoc_vien',true,true);
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->string('ho_ten', 100);
            $table->string('dia_chi', 255);
            $table->string('sdt', 15);
            $table->string('email', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoc_vien');
    }
}
