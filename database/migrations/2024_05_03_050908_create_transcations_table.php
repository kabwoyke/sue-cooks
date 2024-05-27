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
        Schema::disableForeignKeyConstraints();

        Schema::create('transcations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->float('amount');
            $table->enum('payment_method', ["MPESA" , "CREDIT_CARD"])->default("MPESA");
            $table->dateTime('transaction_date');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transcations');
    }
};
