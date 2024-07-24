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
        Schema::create('meds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')
                ->constrained('cats')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('cat_name');
            $table->foreignId('warehouse_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('warehouse_name');
            $table->string('t_name');
            $table->string('s_name');
            $table->string('image')->nullable();
            $table->double('price');
            $table->integer('quantity');
            $table->timestamp('exp_date');
            $table->string('company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meds');
    }
};
