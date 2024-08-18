<?php

use App\Models\CV;
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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CV::class, 'cv_id')->constrained('cv')->cascadeOnDelete();
            $table->string('language_name');
            $table->string('language_level');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['cv_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
