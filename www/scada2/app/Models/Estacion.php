<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    use HasFactory;

    protected $table      = 'tbl_estaciones';
    protected $primaryKey = 'f_idestacion';

    public $timestamps = false;

    protected $fillable = [
        'f_idestacion',
        'f_codestacion',
        'f_nombre',
        'f_direccion',
        'f_situacion',
        'f_lat',
        'f_lng',
        'f_foto',
        'f_es_bombeo',
        'f_es_cloacal',
        'f_es_defensa',
        'f_habilitada',
        'f_idmunicipio',
    ];

    public function setFCodestacionAttribute($value)
    {
        $this->attributes['f_codestacion'] = strtoupper($value);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'f_idmunicipio');
    }

    public function scopeMunicipioId($query, $id)
    {
        if ($id) {
            return $query->Where('f_idmunicipio', $id);
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->orWhere('f_nombre', 'like', $nombre . '%');
        }
    }
}
