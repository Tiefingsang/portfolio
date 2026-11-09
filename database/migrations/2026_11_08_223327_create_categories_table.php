<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('color')->default('#ff6c00');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Ajouter la colonne category_id dans blog_posts (relation)
        if (!Schema::hasColumn('blog_posts', 'category_id')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('category')
                      ->constrained('categories')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            if (Schema::hasColumn('blog_posts', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
        Schema::dropIfExists('categories');
    }
};