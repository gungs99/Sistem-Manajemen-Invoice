<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransaksiLine2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_transaksi_line', function (Blueprint $table) {
            $table->string('deskripsi',255)->nullable();
            $table->string('material',40);
            $table->integer('material_harga');
            $table->integer('ppn')->nullable();

            $table->foreign('material')->references('id')->on('material')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_transaksi_line', function (Blueprint $table) {
            //
        });
    }
}
