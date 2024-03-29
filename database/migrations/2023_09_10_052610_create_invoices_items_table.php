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
        Schema::create('invoices_items', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('description');
            $table->decimal('unit_price');
            $table->decimal('quantity');
            $table->decimal('taxable_amount');
            $table->decimal('tax_rate');
            $table->decimal('tax_amount');
            $table->decimal('subtotal')->comment('Including VAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_items');
    }
};
