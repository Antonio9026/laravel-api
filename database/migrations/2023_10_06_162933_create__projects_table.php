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
        Schema::create('_projects', function (Blueprint $table) {
            $table->id();
            $table->string("title")->reuqired();
            $table->longText("description")->required();
            $table->string("image")->nullable();
            $table->string("github_link")->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_projects');
    }
};
