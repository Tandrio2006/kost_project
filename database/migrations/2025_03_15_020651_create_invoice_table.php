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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->nullable();
            $table->float('harga_pricelist')->default(0);
            $table->date('tanggal_buat');
            $table->date('tanggal_pembukuan');
            // $table->float('harga_terjual')->default(0);
            // $table->string('bundle_id');
            $table->enum('status_pembayaran', ['lunas', 'belum lunas'])->default('belum lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
