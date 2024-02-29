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
        Schema::create('bethelattendance', function (Blueprint $table) {
            $table->id();
			$table->integer('men');
			$table->integer('women');
			$table->integer('children');
			$table->integer('guests');
			$table->integer('converts');
			$table->integer('total');
			$table->text('message');
			$table->text('minister');
			
			$table->date('date');
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bethelattendance');
    }
};
