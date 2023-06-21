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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('zone');
            $table->decimal('distance_range_start', 8, 2);
            $table->decimal('distance_range_end', 8, 2);
            $table->decimal('rate_amount', 8, 2);
            $table->string('currency');
            $table->string('shipping_type');
            $table->date('validity_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
