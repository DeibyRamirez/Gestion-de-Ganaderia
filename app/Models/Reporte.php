<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte';

    protected $fillable = ['id_gestor', 'descripcion', 'fecha_reporte'];
    public function gestor()
{
    return $this->belongsTo(User::class, 'id_gestor', 'id_usuario');
}
    public function ganadero()
{
    return $this->belongsTo(User::class, 'id_ganadero', 'id_usuario');
}

}