<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    // use HasFactory;
    protected $table = 'tecnico';
    protected $fillable = array(
                            'nombres',
                            'apellido_paterno',
                            'apellido_materno',
                            'dni',
                            'correo',
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
    public function usuario(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}