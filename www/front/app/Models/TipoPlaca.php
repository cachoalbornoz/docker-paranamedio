<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlaca extends Model
{
    use HasFactory;

    protected $table      = 'tbl_tipo_placa';
    protected $primaryKey = 'f_idtipoplaca';

    public $timestamps = false;

    protected $fillable = [
        'f_idtipoplaca',
        'f_nombre',
        'f_modelo',
    ];

    public function setFNombreAttribute($value)
    {
        $this->attributes['f_nombre'] = strtoupper($value);
    }

}
