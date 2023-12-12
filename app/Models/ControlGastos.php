<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlGastos extends Model
{
    // use HasFactory;
    protected $table = 'control_gastos';
    protected $primaryKey = 'id';
    
    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id','id');
    }
    public function tecnico(){
        return $this->belongsTo(Tecnico::class,'tecnico_id','id');
    }
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id','id');
    }
}