<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('greenactions', function (Blueprint $table) {
            $table->id();
            $table->string('action_name');
            $table->string('action_description');
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }


    public function down(): void {
        Schema::dropIfExists('greenactions');
    }
};
