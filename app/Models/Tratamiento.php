<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamientos';

    protected $primaryKey = 'id_tratamiento';

    protected $fillable = ['id_gestor', 'id_historial', 'descripcion', 'fecha_tratamiento'];
    public function gestor()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function historial()
    {
        return $this->belongsTo(HistorialMedico::class, 'id_historial');
    }
}
