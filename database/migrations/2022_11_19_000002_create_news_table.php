<?php

use App\Models\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title', 255);
            $table->string('author', 255)->nullable();
            $table->enum('status', [News::DRAFT, News::ACTIVE, News::BLOCKED])->default(News::DRAFT);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->index('title');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
