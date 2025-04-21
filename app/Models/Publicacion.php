<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table ='publicaciones';

    protected $primaryKey = 'id_publicacion';

    protected $fillable = ['id_ganadero', 'tipo_producto', 'descripcion', 'cantidad', 'precio', 'estado', 'fecha'];

    public function ganadero()
    {
        return $this->belongsTo(User::class, 'id_ganadero', 'id_usuario');
    }
}
