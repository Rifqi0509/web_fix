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
<<<<<<< HEAD
            $table->string('undangan');
            $table->string('nama');
            $table->text('alamat');
            $table->string('keperluan');
            $table->string('asal_instansi');
            $table->string('no_hp');
            $table->date('tanggal');
=======
            $table->string('kd_undangan');
            $table->string('nama');
            $table->text('alamat');
            $table->string('asal_instansi');
            $table->string('no_hp');
            $table->string('keperluan');
            $table->enum('departemen', ['keuangan', 'ketenagakerjaan', 'paud/tk','sd', 'smp', 'perencanaan'])->nullable(); 
            $table->enum('seksi', ['kurikulum/penilaian', 'sarana/prasarana', 'pendidik_sd','pendidik_smp',])->nullable(); 
            $table->date('tanggal');
            $table->enum('status', ['Proses', 'Approved', 'Rejected','Pending'])->nullable(); 
            $table->string('ket')->nullable(); 
>>>>>>> 438ad34 (update)
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
