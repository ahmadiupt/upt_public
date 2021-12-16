<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('produk_id');
            $table->text('description');
            $table->integer('qty');
            $table->string('pinjamby',255);
            $table->date('tanggalpinjam');
            $table->date('tanggalkembali');
            $table->integer('user_id');
            $table->string('photo',255);
            $table->integer('pegawai_id');
            $table->integer('status');
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
        Schema::dropIfExists('pinjaman');
    }
}
