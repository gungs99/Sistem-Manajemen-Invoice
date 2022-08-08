<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNamaPerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nama_perusahaan', function (Blueprint $table) {
            $table->string('alamat', 255)->after('nama');
            $table->string('No_rek', 15)->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nama_perusahaan', function (Blueprint $table) {
            //
        });
    }
}
