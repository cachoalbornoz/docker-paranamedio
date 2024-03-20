<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table      = 'tbl_municipios';
    protected $primaryKey = 'f_idmunicipio';

    public $timestamps = false;

    protected $fillable = [
        'f_idmunicipio',
        'f_nombre',
        'f_contacto',
    ];

    public function setFNombreAttribute($value)
    {
        $this->attributes['f_nombre'] = strtoupper($value);
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('f_nombre', 'like', $nombre . '%');
        }
    }

    public function estaciones()
    {
        return $this->hasMany(Estacion::class, 'f_idmunicipio', 'f_idmunicipio')->get();
    }

    public function cantEstaciones()
    {
        return $this->estaciones()->count();
    }
}
