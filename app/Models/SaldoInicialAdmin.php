<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaldoInicialAdmin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='saldo_inicial_admins';

    protected $primaryKey="id";

    protected $fillable =[
        'fecha_registro',
        'idEmpresa',
        'descripcion'
    ];

    protected $guarded =[

    ];

    public function sIEmpresaAdmin()// nombre de la funcion
    {
        //Aquí se declaran el nombre modelo y llamar a sus atribbutos
        return $this->hasOne(Empresa::class, 'id', 'idEmpresa');
    }
}
