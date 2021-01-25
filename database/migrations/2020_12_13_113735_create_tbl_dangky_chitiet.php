<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDangkyChitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dangky_chitiet', function (Blueprint $table) {
            $table->bigIncrements('dangky_id');
            $table->string('customers_name');
            $table->string('customers_email');
            $table->string('customers_phone');
            $table->integer('khoahoc_name');
            $table->integer('ngay_khaigiang');
            $table->integer('thoigian_hoc');
            $table->integer('thoiluong_hoc');
            $table->integer('dia_diem');
            $table->integer('hoc_phi');
            $table->integer('dangky_status');
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
        Schema::dropIfExists('tbl_dangky_chitiet');
    }
}
