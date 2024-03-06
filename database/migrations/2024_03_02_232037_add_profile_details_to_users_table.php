<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact')->nullable()->after('email');
            $table->string('number')->nullable()->after('contact');
            $table->text('bio')->nullable()->after('number');
        });
    }

   
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('contact');
                $table->dropColumn('number');
                $table->dropColumn('bio');
            });
        });
    }
};
