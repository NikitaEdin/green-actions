<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');
            $table->decimal('paid_amount');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('subscriptions');
    }
};
