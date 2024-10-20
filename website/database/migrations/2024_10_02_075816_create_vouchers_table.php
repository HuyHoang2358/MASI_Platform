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
        Schema::create('vouchers', function (Blueprint $table) {
            // Khai báo các cột trong bảng vourchers
            $table->id(); // Cột ID
            $table->text('name');
            $table->text('code');
            $table->text('image');
            $table->text('visibility');
            $table->integer('discount_amount');
            $table->integer('type');
            $table->timestamps(); // Cột created_at vs updated_at
            $table->integer('quantity');
            $table->integer('in_stock');
            $table->text('description');
        });
        //  php artisan migrate
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
