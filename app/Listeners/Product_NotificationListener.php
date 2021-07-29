<?php

namespace App\Listeners;

use App\Models\Product_Notification;
use App\Models\Usuario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class Product_NotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $usuario = auth()->user();
        $empresa = $usuario->empresas()->firstOrFail();


        $usuarios = Usuario::query()->whereHas('colaboradores', fn($query) => $query->where('empresa_id', $empresa->id))->get();
        Notification::send($usuarios, new Product_Notification($event->pron));
    }
}
