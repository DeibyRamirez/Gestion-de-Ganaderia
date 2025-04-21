<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';

    protected $fillable =['id_venderdor', 'id_comprador', 'producto', 'cantidad', 'precio', 'fecha_venta'];

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }
    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }
}
