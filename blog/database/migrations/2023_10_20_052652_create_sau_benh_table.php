<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSauBenhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde.sau_benh', function (Blueprint $table) {
            $table->integer('idsaubenh');
            $table->integer('idvungtrong');
            $table->string('tensaubenh', 20)->nullable();
            $table->integer('mucdogayhai')->nullable();
            $table->timeTz('thoigianphathien')->nullable();
            $table->integer('hinhanh')->nullable();
            $table->text('mota')->nullable();
            $table->text('phuongphap')->nullable();
            $table->primary(['idsaubenh', 'idvungtrong']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sau_benh');
    }
}