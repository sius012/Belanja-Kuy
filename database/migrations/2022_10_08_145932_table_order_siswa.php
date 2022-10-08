<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrderSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("order_siswa", function(Blueprint $table){
            $table->string("id_order_siswa");
            $table->string("id_order");
            $table->string("id_pemesan");
            $table->integer("total");
            $table->date("tanggal_pemesan");
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
