<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subforum extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    
    ];

    public function topico(){
        return $this->hasMany(topico::class,'id_forum','id');
    }
}
