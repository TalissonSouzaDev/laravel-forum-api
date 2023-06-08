<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topico extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_to',
        'title',
        'description',
        'forum_id',
    ];

    public function comentario(){
        return $this->hasMany(comentario::class);
    }

    public function subforum(){
        return $this->belongsTo(subforum::class,'id_forum','id');
    }
}
