<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionesG extends Model
{
    use HasFactory;

    protected $table ='publicaciones_ganado';

    protected $primaryKey = 'id_publicacion';

    protected $fillable = ['id_vaca','id_ganadero', 'descripcion', 'precio', 'estado', 'fecha'];

    public function ganadero()
    {
        return $this->belongsTo(User::class, 'id_ganadero', 'id_usuario');
    }
}