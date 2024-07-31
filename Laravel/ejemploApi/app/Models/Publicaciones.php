<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'contenido',
        'user_id',
    ];

    public function autor(){
        return $this->belongsTo(User::class);
    }

}
