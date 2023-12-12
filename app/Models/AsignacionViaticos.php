<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionViaticos extends Model
{
    // use HasFactory;
    protected $table = 'asignacion_viaticos';
    protected $fillable = array(
                            'num_pry',
                            'monto',
                            'fecha_proyecto',
                            'dias_proyecto',
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id','id');
    }
    public function tecnico(){
        return $this->belongsTo(Tecnico::class,'tecnico_id','id');
    }
    public function proyecto(){
        return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }
    public function distritos(){
        return $this->hasMany(Distritos::class);
    }
}