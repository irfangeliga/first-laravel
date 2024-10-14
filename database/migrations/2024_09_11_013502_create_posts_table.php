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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->dateTime('waktu', precision: 0);
            $table->text('sinopsis');
            $table->text('image');
            $table->timestamps();

            $table->foreignId('penulis_id')->constrained(
                table: 'users',
                indexName: 'posts_penulis_id'
            );

            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_category_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
