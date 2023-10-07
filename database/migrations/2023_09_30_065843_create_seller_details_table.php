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
        Schema::create('seller_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('middle_name_ar')->nullable();
            $table->string('last_name')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_name_ar')->nullable();
            $table->string('building_number')->nullable();
            $table->string('building_number_ar')->nullable();
            $table->string('additional_number')->nullable();
            $table->string('additional_number_ar')->nullable();
            $table->string('street')->nullable();
            $table->string('street_ar')->nullable();
            $table->string('district')->nullable();
            $table->string('district_ar')->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('pincode_ar')->nullable();
            $table->string('city')->nullable();
            $table->string('city_ar')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('vat_number_ar')->nullable();
            $table->string('cr_number')->nullable();
            $table->string('cr_number_ar')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('iban_number')->nullable();
            $table->boolean('subscription_status')->default(0);
            $table->boolean('subscription_type_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_details');
    }
};
