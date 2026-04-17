<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('colocation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announce_id')->unique()->constrained('announces')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->integer('number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colocation');
    }
};
