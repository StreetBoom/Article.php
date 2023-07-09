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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("article_id")->nullable();
            $table->unsignedBigInteger("count")->nullable();
            $table->timestamps();
            $table->index('article_id', 'comment_article_idx');
            $table->foreign('article_id', 'comment_article_fk')->on('articles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
