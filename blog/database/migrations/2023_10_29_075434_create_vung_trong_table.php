<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVungTrongTable extends Migration
{
    public function up()
    {
        Schema::create('sde.vung_trong', function (Blueprint $table) {
            $table->integer('iddiachinh');
            $table->integer('idvungtrong');
            $table->double('dientichtrong')->nullable();
            $table->string('giongcay', 20)->nullable();
            $table->integer('tuoicay')->nullable();
            $table->string('giaidoansinhtruong', 20)->nullable();
            $table->date('ngaytrong')->nullable();
            $table->string('loaidat', 20)->nullable();

            $table->primary(['iddiachinh', 'idvungtrong']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('sde.vung_trong');
    }
}
