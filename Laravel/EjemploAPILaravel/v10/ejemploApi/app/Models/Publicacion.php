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

    public $timestamps = false;

    //Los campos que se debe llenar con datos externos se indican en un array
    protected $fillable = ['titulo','contenido'];
}
