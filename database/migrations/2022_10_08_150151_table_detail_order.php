<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableDetailOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("detail_order", function(Blueprint $table){
            $table->string("id_order");
            $table->string("kode_transaksi");
            $table->string("id_produk");
            $table->integer("harga_produk");
            $table->integer("jumlah_produk");
            $table->string("keterangan");
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
