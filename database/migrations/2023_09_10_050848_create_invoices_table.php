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
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();
            $table->string('seller_id');
            $table->string('invoice_number')->nullable();
            $table->integer('type_of_invoice')->comment('1-simple, 2-tax');

            $table->string('seller_name');
            $table->string('seller_building_number');
            $table->string('seller_street');
            $table->string('seller_district');
            $table->string('seller_city');
            $table->string('seller_pincode');
            $table->string('seller_additional_number');
            $table->string('seller_vat_number');
            $table->string('seller_cr_number');
            $table->string('seller_country');

            $table->string('seller_name_ar');
            $table->string('seller_building_number_ar');
            $table->string('seller_street_ar');
            $table->string('seller_district_ar');
            $table->string('seller_city_ar');
            $table->string('seller_additional_number_ar');
            $table->string('seller_vat_number_ar');
            $table->string('seller_cr_number_ar');
            $table->string('seller_country_ar');

            $table->string('buyer_name')->nullable();
            $table->string('buyer_building_number')->nullable();
            $table->string('buyer_street')->nullable();
            $table->string('buyer_district')->nullable();
            $table->string('buyer_city')->nullable();
            $table->string('buyer_pincode')->nullable();
            $table->string('buyer_additional_number')->nullable();
            $table->string('buyer_vat_number')->nullable();
            $table->string('buyer_cr_number')->nullable();
            $table->string('buyer_country')->nullable();


            $table->string('buyer_name_ar')->nullable();
            $table->string('buyer_building_number_ar')->nullable();
            $table->string('buyer_street_ar')->nullable();
            $table->string('buyer_district_ar')->nullable();
            $table->string('buyer_city_ar')->nullable();
            $table->string('buyer_additional_number_ar')->nullable();
            $table->string('buyer_vat_number_ar')->nullable();
            $table->string('buyer_cr_number_ar')->nullable();
            $table->string('buyer_country_ar')->nullable();


            $table->string('items_total')->nullable();
            $table->string('total_vat')->nullable();
            $table->string('total_amount')->nullable();

            $table->string('account_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('iban_number');

            $table->json('items_ids')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
