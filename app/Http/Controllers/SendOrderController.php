<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        return 'Hola Julio en cuentra';
    }
}
