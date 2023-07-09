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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("article_id")->nullable();
            $table->text("text");
            $table->timestamps();
            $table->index('user_id', 'comment_user_idx');
            $table->index('article_id', 'comment_article_idx');
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');
            $table->foreign('article_id', 'comment_article_fk')->on('articles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
