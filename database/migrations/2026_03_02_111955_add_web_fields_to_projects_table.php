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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('link_deploy')->nullable()->after('description');
            $table->string('link_github')->nullable()->after('link_deploy');
            $table->string('tech_stack')->nullable()->after('link_github');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['link_deploy', 'link_github', 'tech_stack']);
        });
    }
};
