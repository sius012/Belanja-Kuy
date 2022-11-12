<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('produks', function (Blueprint $table) {
            $table->string("kode_produk",25)->primary();
            $table->string("nama_produk",255);
            $table->integer("harga_satuan");
            $table->string("satuan",25);
            $table->integer("id_kategori");
            $table->string("id_merek");
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
        Schema::drop('produks');
    }
}
