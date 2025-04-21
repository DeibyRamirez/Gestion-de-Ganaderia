<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    protected $table = 'produccion';

    protected $primaryKey = 'id_produccion';

    protected $fillable = ['id_vaca', 'tipo_produccion', 'cantidad', 'fecha'];

    public function ganado()
    {
        return $this->belongsTo(Ganado::class, 'id_vaca');
    }
}
