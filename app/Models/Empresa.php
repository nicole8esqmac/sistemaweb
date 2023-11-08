<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='empresa_admins';

    protected $primaryKey="id";

    protected $fillable =[
        'nit',
        'nombre_empresa',
        'direccion',
        'ciudad'
    ];

    protected $guarded =[

    ];


}
