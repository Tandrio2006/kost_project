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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name_property');
            $table->foreignId('proyek_id')->constrained()->onDelete('cascade');
            $table->string('blok');
            $table->string('no');
            $table->integer('lb')->default(0);
            $table->integer('lt')->default(0);
            $table->foreignId('property_status_id')->constrained('property_statuses')->onDelete('cascade');
            $table->timestamp('selling_date')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('salesperson_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->float('pricelist_price')->default(0);
            $table->float('selling_price')->default(0);
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade');
            $table->float('paid_price')->default(0);
            $table->float('paid_percentage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
