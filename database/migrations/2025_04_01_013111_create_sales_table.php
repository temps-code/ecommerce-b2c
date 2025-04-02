<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            // Clave foránea hacia la tabla de usuarios
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Puedes eliminar o comentar el campo total, ya que se calculará dinámicamente
            // $table->decimal('total', 10, 2);
            $table->dateTime('sale_date');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
}
