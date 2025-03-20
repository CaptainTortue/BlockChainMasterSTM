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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // foreign key from wallet table for the sender
            $table->foreignId('sender_id')->nullable()->constrained('wallet');
            // foreign key from wallet table for the receiver
            $table->foreignId('receiver_id')->nullable()->constrained('wallet');
            $table->float('amount', 8, 2);
            $table->string('hash');
            $table->integer('nonce');
            $table->float('fee', 8, 2);
            $table->string('signature');
            $table->integer('bloc_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
