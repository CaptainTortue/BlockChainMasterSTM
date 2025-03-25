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
        Schema::create('blocs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hash');
            // nullable if it's the first bloc or if it's not validate yet
            $table->string('previous_hash')->nullable();
            $table->string('merkle_root');
            $table->integer('difficulty');
            $table->float('reward', 8, 2);
            // user_id is the miner
            $table->foreignId('miner_id')->constrained('users');
            // number of value created by the miner
            $table->float('value_created', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocs');
    }
};
