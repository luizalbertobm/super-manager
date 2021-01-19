<?php

namespace App\Http\Controllers;

use App\ContactReason;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $motivos = ContactReason::all();
        return view('site.main', ['motivos' => $motivos]);
    }
}
