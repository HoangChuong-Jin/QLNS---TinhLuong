<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phucap', function (Blueprint $table) {
            $table->id();
            $table->string('maphucap')->unique();
            $table->string('tenphucap');
            $table->string('sotien');
            $table->string('ghichu')->nullable();

            $table->foreignId('chucvu_id')->constrained('chucvu');

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
        Schema::dropIfExists('phucap');
    }
}
