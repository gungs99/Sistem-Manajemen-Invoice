<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_transaksi_line', function (Blueprint $table) {
            $table->string('id',40);
            $table->string('header',40);
            $table->string('jasa',40);
            $table->timestamps();

            $table->primary('id');
            $table->foreign('header')->references('id')->on('table_transaksi')->onDelete('cascade');
            $table->foreign('jasa')->references('id')->on('jasa')->onDelete('restrict');
            $table->engine = 'InnoDB';
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
