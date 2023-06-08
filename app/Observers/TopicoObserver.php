<?php

namespace App\Observers;

use App\Models\topico;

class TopicoObserver
{
    /**
     * Handle the topico "created" event.
     *
     * @param  \App\Models\topico  $topico
     * @return void
     */
    public function creating(topico $topico)
    {
        $topico->user_to = auth()->user()->nikname;
    }

    /**
     * Handle the topico "updated" event.
     *
     * @param  \App\Models\topico  $topico
     * @return void
     */
    public function updating(topico $topico)
    {
        $topico->user_to = auth()->user()->nikname;
    }

    
}
