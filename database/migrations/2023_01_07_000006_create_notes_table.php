<?php

use Database\Seeders\NotesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->timestamps();
        });
        (new NotesSeeder())->run();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
