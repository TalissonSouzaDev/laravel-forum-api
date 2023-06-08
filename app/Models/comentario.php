<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_to',
        'content',
        'topico_id',
    ];

    public function topico(){
        return $this->belongsTo(topico::class);
    }
}
