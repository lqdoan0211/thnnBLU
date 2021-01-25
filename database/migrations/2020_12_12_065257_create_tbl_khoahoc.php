<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKhoahoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khoahoc', function (Blueprint $table) {
            $table->bigIncrements('khoahoc_id');
            $table->integer('category_id');
            $table->string('khoahoc_name');
            $table->string('khoahoc_image');
            $table->string('ngay_khaigiang');
            $table->string('thoigian_hoc');
            $table->string('thoiluong_hoc');
            $table->integer('hoc_phi');
            $table->string('dia_diem');
            $table->string('chi_tiet');
            $table->integer('khoahoc_status');
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
        Schema::dropIfExists('tbl_khoahoc');
    }
}
