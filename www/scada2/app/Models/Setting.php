<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table      = 'tbl_setting';
    protected $primaryKey = 'f_idsetting';

    public $timestamps = false;

    protected $fillable = [
        'f_idsetting',
        'f_detenerlecturas',
        'f_placasaleer',
        'f_reintentos',
        'f_iteracciones',
    ];
}
