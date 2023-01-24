<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapasiens', function (Blueprint $table) {
            $table->id();
            $table->string('norec');
            $table->boolean('statusenabled');
            $table->date('tglregistrasi');
            $table->integer('nocm');
            $table->integer('nocmfk');
            $table->integer('noregistrasi');
            $table->string('namaruangan');
            $table->string('namapasien');
            $table->enum('kelompokpasien', ['umum','pribadi']);
            $table->enum('namarekanan',['umum','dirisendiri']);
            $table->string('namadokter');
            $table->date('tanggalpulang');
            $table->string('statuspasien');
            $table->integer('norec_pa')->nullable();
            $table->string('objecasuransipasienfk')->nullable();
            $table->integer('pgid');
            $table->integer('objectruanganlastfk')->nullable();
            $table->integer('nosep')->nullable();
            $table->integer('norec_br')->nullable();
            $table->integer('nostruklastfk')->nullable();
            $table->integer('noreservasi')->nullable();
            $table->string('kelasditanggung')->nullable();
            $table->string('namakelas');
            $table->date('tanggallahir');
            $table->integer('objecdepartemenfk');
            $table->integer('objeckelasfk');
            $table->integer('deptid');
            $table->string('ppkrujukan')->nullable();
            $table->string('istelemedicine')->nullable();
            $table->string('jaminankhusus')->nullable();
            $table->integer('noidentitas');
            $table->integer('statusschedule');
            $table->string('isdiagnosis');
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
        Schema::dropIfExists('datapasiens');
    }
};
