<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vip', function (Blueprint $table) {
            $table->id();
            $table->string('kd_undangan');
            $table->string('nama');
            $table->text('alamat');
            $table->string('keperluan');
            $table->string('asal_instansi');
            $table->string('no_hp');
            $table->date('tanggal');
            $table->string('jam');
            $table->enum('status', ['Proses', 'Approved', 'Rejected','Pending'])->nullable(); 
            $table->enum('departemen', ['keuangan', 'ketenagakerjaan', 'paud/tk','sd', 'smp', 'perencanaan'])->nullable(); 
            $table->enum('seksi', ['kurikulum/penilaian', 'sarana/prasarana', 'pendidik_sd','pendidik_smp',])->nullable(); 
            $table->string('ket')->nullable(); 
            $table->string('tanda_tangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vips');
    }
};
