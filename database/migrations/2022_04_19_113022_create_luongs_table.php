<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luong', function (Blueprint $table) {
            $table->id();
            $table->string('maluong')->unique();

            $table->foreignId('nhanvien_id')->constrained('nhanvien');
            $table->foreignId('chucvu_id')->constrained('chucvu');
            $table->foreignId('bangluong_id')->constrained('bangluong');

            $table->string('ngaycong');
            $table->string('luongthang');
            $table->string('phucap');
            $table->string('khoantru');
            $table->string('tamung')->nullable();

            $table->string('thuclanh');
            $table->string('ngaycham');

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
        Schema::dropIfExists('luong');
    }
}
