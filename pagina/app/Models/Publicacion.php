<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $fillable=[
        'titulo','contenido','categoria',
        'numDeVotaciones','urlImagenPublicacion',
        'nombre_autor','urlImagen_autor'
    ];
}
