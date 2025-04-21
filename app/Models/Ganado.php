<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    use HasFactory;

    protected $table = 'ganado';

    protected $primaryKey = 'id_vaca';

    protected $fillable = ['id_ganadero', 'nombre', 'raza', 'edad', 'tipo', 'fecha_nacimiento'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_ganadero');
    }
}
