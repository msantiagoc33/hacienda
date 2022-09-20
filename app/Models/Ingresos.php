<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    
    use HasFactory;

    /**
     * Estos son los campos que se va a permitir que se graben en la tabla Ingresos
     */
    protected $fillable = ['cliente_id', 'plataforma_id', 'huespedes', 'fechaEntrada', 'fechaSalida', 'importe', 'comentario'];

    public function cliente(){
        return $this->belongsTo(Clientes::class);
    }

    public function plataforma(){
        return $this->belongsTo(Plataformas::class);
    }
}
