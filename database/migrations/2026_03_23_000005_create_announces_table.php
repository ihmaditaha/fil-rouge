<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['property', 'colocation']);
            $table->enum('status', ['pending', 'approved', 'rejected', 'archived'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announces');
    }
};
