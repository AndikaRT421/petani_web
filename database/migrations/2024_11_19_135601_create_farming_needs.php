<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farming_needs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitras')->onDelete('cascade');
            $table->string('item_type');
            $table->string('item_name');
            $table->text('description'); 
            $table->integer('stock')->default(0);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('photo', 300)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farming_needs');
    }
};
