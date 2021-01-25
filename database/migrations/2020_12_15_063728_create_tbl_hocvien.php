<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHocvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hocvien', function (Blueprint $table) {
            $table->bigIncrements('hocvien_id');
            $table->string('hocvien_name');
            $table->string('hocvien_image');
            $table->integer('hocvien_phai');
            $table->string('hocvien_ngaysinh');
            $table->string('hocvien_diachi');
            $table->string('hocvien_cmnd');
            $table->string('hocvien_email');
            $table->integer('hocvien_phone');
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
        Schema::dropIfExists('tbl_hocvien');
    }
}
