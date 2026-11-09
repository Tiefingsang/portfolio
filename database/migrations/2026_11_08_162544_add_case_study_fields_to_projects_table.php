<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('title');
            }
            if (!Schema::hasColumn('projects', 'client_name')) {
                $table->string('client_name')->nullable()->after('description');
            }
            if (!Schema::hasColumn('projects', 'client_industry')) {
                $table->string('client_industry')->nullable()->after('client_name');
            }
            if (!Schema::hasColumn('projects', 'problem')) {
                $table->text('problem')->nullable()->after('client_industry');
            }
            if (!Schema::hasColumn('projects', 'process')) {
                $table->text('process')->nullable()->after('problem');
            }
            if (!Schema::hasColumn('projects', 'solution')) {
                $table->text('solution')->nullable()->after('process');
            }
            if (!Schema::hasColumn('projects', 'results')) {
                $table->text('results')->nullable()->after('solution');
            }
            if (!Schema::hasColumn('projects', 'metrics')) {
                $table->json('metrics')->nullable()->after('results');
            }
            if (!Schema::hasColumn('projects', 'testimonial')) {
                $table->text('testimonial')->nullable()->after('metrics');
            }
            if (!Schema::hasColumn('projects', 'testimonial_author')) {
                $table->string('testimonial_author')->nullable()->after('testimonial');
            }
            if (!Schema::hasColumn('projects', 'case_study_image')) {
                $table->string('case_study_image')->nullable()->after('testimonial_author');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'slug', 'client_name', 'client_industry', 'problem', 'process',
                'solution', 'results', 'metrics', 'testimonial', 'testimonial_author',
                'case_study_image',
            ]);
        });
    }
};
