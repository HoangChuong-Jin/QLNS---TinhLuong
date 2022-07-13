<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->string('manv')->unique();
            $table->string('tennv');
            $table->string('hinhanh')->nullable();
            $table->tinyInteger('gioitinh');
            $table->date('ngaysinh');
            $table->string('noisinh');
            $table->string('cmnd');
            $table->string('noicap_cmnd');
            $table->date('ngaycap_cmnd');
            $table->string('hokhau');
            $table->string('tamtru');
            $table->tinyInteger('trangthai')->default(1); /*trang thai lam viec*/

            $table->foreignId('honnhan_id')->constrained('tinhtranghonnhan');

            $table->foreignId('quoctich_id')->constrained('quoctich');
            $table->foreignId('tongiao_id')->constrained('tongiao');
            $table->foreignId('dantoc_id')->constrained('dantoc');

            $table->foreignId('loainv_id')->constrained('loainhanvien');
            $table->foreignId('chuyenmon_id')->constrained('chuyenmon');
            $table->foreignId('trinhdo_id')->constrained('trinhdo');
            $table->foreignId('bangcap_id')->constrained('bangcap');
            $table->foreignId('chucvu_id')->constrained('chucvu');
            $table->foreignId('phongban_id')->constrained('phongban');

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
        Schema::dropIfExists('nhanvien');
    }
}
