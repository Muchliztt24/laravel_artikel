<?php

namespace App\Http\Controllers;
use App\Models\Anime;
use App\Models\jenis;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
{
    $anime = Anime::all();
    $jenis = Jenis::all();
    return view('welcome', compact('anime', 'jenis'));
}

}
