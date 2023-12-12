<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleControlGastos extends Model
{
    // use HasFactory;
    protected $table = 'detalle_control_gastos';
    protected $fillable = array(
                            'num_comprobante',
                            'costo_igv',
                            'fecha',
                            'proveedor',
                            'categoria_gastos',
                            'ruta_archivo';
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function control_gastos(){
        return $this->belongsTo(ControlGastos::class,'control_gastos_id','id');
    }
}