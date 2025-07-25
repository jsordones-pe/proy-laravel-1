<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('posts', function(Blueprint $table){
            $table->foreignIdFor(Category::class)
                ->nullable()
                ->after("body")
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropConstrainedForeignIdFor(Category::class);
        });
        
        Schema::dropIfExists('categories');
    }
};
