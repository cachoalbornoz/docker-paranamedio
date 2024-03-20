<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analogico extends Model
{
    use HasFactory;

    protected $table      = 'tbl_analogicos';
    protected $primaryKey = 'f_idanalogico';

    public $timestamps = false;

    protected $fillable = [
        'f_idplaca',
        'f_var',
        'f_factor',
        'f_rango_inferior',
        'f_rango_superior',
        'f_habilitado',
        'f_fecha_ultima_calibracion',
    ];

    public function placa()
    {
        return $this->belongsTo(Placa::class, 'f_idplaca');
    }

}
