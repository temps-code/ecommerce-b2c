<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Definimos los campos que se pueden asignar en masa
    protected $fillable = [
        'user_id',
        'sale_date',
        'is_active',
    ];
    
    /**
     * Relación: Una venta pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }


    /**
     * Relación: Una venta tiene muchos detalles.
     */
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    /**
     * Accesor para calcular el total de la venta a partir de sus detalles.
     * Uso: $sale->calculated_total
     */
    public function getCalculatedTotalAttribute()
    {
        return $this->saleDetails->sum(function ($detail) {
            return $detail->quantity * $detail->unit_price;
        });
    }
}
