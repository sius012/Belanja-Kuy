<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableDetailSaldo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_saldo', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_admin')->nullable();
            $table->enum('aksi', ['keluar', 'masuk']);;
            $table->integer('nominal');
            $table->integer('saldo_tersisa');
            $table->string('keterangan');
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
        //
    }
}
