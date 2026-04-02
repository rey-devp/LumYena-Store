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
        Schema::table('users', function (Blueprint $table) {
            $table->string('game_id')->nullable()->after('email');
            $table->string('streaming_username')->nullable()->after('game_id');
            $table->string('whatsapp')->nullable()->after('streaming_username');
            $table->string('preferred_payment')->nullable()->after('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['game_id', 'streaming_username', 'whatsapp', 'preferred_payment']);
        });
    }
};
