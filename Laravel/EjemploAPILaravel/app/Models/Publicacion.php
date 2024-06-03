<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

      //La tabla asociada al modelo
      protected $table = 'publicaciones';

      //La clave primaria de la tabla asociada al modelo
      protected $primaryKey = 'id';
}
