<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactus;
use Illuminate\Http\Request;
use App\Mail\ContactanosMailabe;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    public function index(){

        return view('contactus.index');

    }

    public function store(StoreContactus $request){

        $email = new ContactanosMailabe($request->all());

        Mail::to('apontejuliocesar@gmail.com')->send($email);

        // SE ENVIA REDIRECCIONA CON UN MENSAJE DE SESION REVISAR >WITH
        return redirect()->route('contactus.index')->with('info','Mensaje enviado');
    }
}
