<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class NonapiController extends Controller
{
    public function index()
    {
        return Entreprise::where('nom','Charrier')->get();
    }
}
