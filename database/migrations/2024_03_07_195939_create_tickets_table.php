<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // creator of the ticket, who opened it
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->boolean('is_open')->default(true); // 2 states, open or close
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tickets');
    }
};
