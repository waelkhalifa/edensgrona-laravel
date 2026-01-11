<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code', 20);
            $table->enum('customer_type', ['private', 'company'])->default('private');
            $table->text('help_needed');
            $table->text('measurements')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'read', 'replied', 'archived'])->default('new');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('email');
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
