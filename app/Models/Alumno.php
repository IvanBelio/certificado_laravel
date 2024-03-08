<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    // Atributo de nivel de seguirdad para permitir que mande esos datos en grupo (array).
    protected $fillable = ["nombre", "apellidos", "direccion", "telefono", "email"];
    public function idiomas(){
        return $this->hasMany(Idioma::class);
        
}
}
