<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentacion extends Model
{
    use HasFactory;

    protected $table = 'alimentacion';

    protected $primaryKey = 'id_alimentacion';

    protected $fillable = ['id_vaca', 'plan_alimenticio', 'fecha_inicio', 'fecha_fin'];
    public function ganado()
    {
        return $this->belongsTo(Ganado::class, 'id_vaca');
    }
}
