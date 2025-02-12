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
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('instansi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('total_prize');
            $table->timestamps();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->string('product');
            $table->integer('qty');
            $table->integer('prize');
            $table->timestamps();
        });

        Schema::create('invoice_down_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->integer('total_dp');
            $table->date('tanggal');
            $table->timestamps();
        });

        Schema::create('invoice_headers', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('logo_image')->nullable();
            $table->string('title');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('website')->nullable();
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('bank_number');
            $table->string('atas_nama');
            $table->timestamps();
        });

        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->string('sign_name');
            $table->string('sign_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signs');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('invoice_headers');
        Schema::dropIfExists('invoice_down_payments');
        Schema::dropIfExists('invoice_details');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('customers');
    }
};
