<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangKhuyenCaoTable extends Migration
{
    public function up()
    {
        Schema::create('sde.bang_khuyen_cao', function (Blueprint $table) {
            $table->integer('idkhuyencao');
            $table->text('noidung');
            $table->time('thoigian');
            $table->integer('idcanbo');
            $table->primary(['idkhuyencao', 'idcanbo']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sde.bang_khuyen_cao');
    }
}
