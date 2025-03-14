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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('title');
            $table->string('no_ktp');
            $table->string('alias');
            $table->string('no_hp');
            $table->string('no_hp2');
            $table->string('email');
            $table->foreignId('customer_type_id')->constrained()->onDelete('cascade');
            $table->string('unit');
            $table->foreignId('salesperson_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->string('keywords');
            $table->string('notes');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
