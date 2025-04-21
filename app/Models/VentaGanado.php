<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaGanado extends Model
{
    use HasFactory;

    protected $table = 'ventas_ganado';

    protected $primaryKey = 'id_venta';

    protected $fillable = ['id_vaca', 'id_vendedor', 'id_comprador', 'precio', 'fecha_venta'];
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }
    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }
    public function vaca()
    {
        return $this->belongsTo(Ganado::class, 'id_vaca');
    }
}
