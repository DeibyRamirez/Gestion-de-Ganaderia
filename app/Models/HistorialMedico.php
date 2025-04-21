<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'historial_medico';
    protected $primaryKey = 'id_historial';

    protected $fillable = ['id_vaca', 'sintomas', 'diagnostico', 'fecha_diagnostico'];
    
    public function ganado()
    {
        return $this->belongsTo(Ganado::class, 'id_vaca');
    }
}


