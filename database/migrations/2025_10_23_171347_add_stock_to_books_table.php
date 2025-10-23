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
        Schema::table('books', function (Blueprint $table) {
            $table->integer('stock')->default(10)->after('published_year');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
         $table->dropColumn('stock');
        });
    }

};
