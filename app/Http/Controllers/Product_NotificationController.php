<?php

namespace App\Http\Controllers;

use App\Events\Product_NotificacionEvent;
use App\Models\Product_Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Product_NotificationController extends Controller
{
    //
    public function create(){
        return view('product_notification.create');
    }

    public function store($titulo,$descripcion){
        $usuario = auth()->user();
        $data['titulo']=$titulo;
        $data['descripcion']=$descripcion;
        $data['usuario']= $usuario->id;
        $data['user_id']= $usuario->id;
        $pron = Product_Notification::create($data);
        event(new Product_NotificacionEvent($pron));
    }
    
}
