<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placa extends Model
{
    use HasFactory;

    protected $table      = 'tbl_placas';
    protected $primaryKey = 'f_idplaca';

    public $timestamps = false;

    protected $fillable = [
        'f_nombre',
        'f_detalle',
        'f_ip',
        'f_orden',
        'f_fecha_montaje',
        'f_fecha_baja',
        'f_habilitada',
        'f_idestacion',
        'f_idtipoplaca',
    ];

    public function estacion()
    {
        return $this->belongsTo(Estacion::class, 'f_idestacion');
    }

    public function tipo_placa()
    {
        return $this->belongsTo(TipoPlaca::class, 'f_idtipoplaca');
    }

    public function datalogger()
    {
        return $this->hasOne(DataLogger::class, 'f_idplaca');
    }

    public function analogicos()
    {
        return $this->hasMany(Analogico::class, 'f_idplaca');
    }
}
