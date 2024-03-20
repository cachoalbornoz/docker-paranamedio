<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLogger extends Model
{
    use HasFactory;

    protected $table      = 'tbl_datalogger_electrotas';
    protected $primaryKey = 'f_idregistro';

    public $timestamps = false;

    protected $fillable = [
        'f_idplaca',
        'f_fecha',
        'f_ED1',
        'f_ED2',
        'f_ED3',
        'f_ED4',
        'f_ED5',
        'f_ED6',
        'f_ED7',
        'f_ED8',
        'f_EA1',
        'f_EA2',
        'f_EA3',
        'f_SR1',
        'f_SR2',
        'f_SR3',
        'f_SR4',
        'f_SR5',
        'f_SR6',
        'f_SR7',
        'f_SR8',
    ];

    public function placa()
    {
        return $this->belongsTo(Placa::class, 'f_idplaca');
    }

    public function getAnalogico($campo, $valor)
    {
        $valor = $this->hasMany(Analogico::class, 'f_idplaca')->where('tbl_analogicos.f_var', $valor)->select($campo)->pluck($campo)->first();
        return ($valor) ? $valor : 0;
    }

    public function getAnalogicos()
    {
        return $this->hasMany(Analogico::class, 'f_idplaca')->get();
    }

}
