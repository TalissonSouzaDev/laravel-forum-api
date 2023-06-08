<?php

namespace App\Observers;

use App\Models\comentario;

class ComentarioObserver
{
    /**
     * Handle the comentario "created" event.
     *
     * @param  \App\Models\comentario  $comentario
     * @return void
     */
    public function creating(comentario $comentario)
    {
        $comentario->user_to = auth()->user()->nikname;
    }

    /**
     * Handle the comentario "updated" event.
     *
     * @param  \App\Models\comentario  $comentario
     * @return void
     */
    public function updating(comentario $comentario)
    {
        $comentario->user_to = auth()->user()->nikname;
    }

    
}
