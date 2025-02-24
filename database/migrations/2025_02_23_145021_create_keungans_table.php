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
        Schema::create('keungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tamu_id')->constrained()->cascadeOnDelete();
            $table->string('tujuan_pembayaran');
            $table->timestamps();

            // $table->foreignId('tamu_id')->constrained()->cascadeOnDelete();
            // artinya:
            // foreignId('tamu_id'):

            //     Menambahkan kolom tamu_id ke tabel yang merupakan kunci asing (foreign key).

            //     Kolom ini dihubungkan dengan kolom id pada tabel tamu.

            // ->constrained():

            //     Menetapkan bahwa tamu_id adalah kunci asing yang terikat (constrained) pada tabel tamu.

            //     Secara otomatis menentukan tabel dan kolom yang akan menjadi target kunci asing (dalam hal ini adalah tamu.id).

            // ->cascadeOnDelete():

            //     Menetapkan aturan penghapusan cascade, artinya jika sebuah entri pada tabel tamu dihapus, maka semua entri yang terkait dalam tabel yang memiliki tamu_id akan ikut terhapus.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keungans');
    }
};
