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

    public function daftar($id)
    {
        $anime = Anime::latest()->paginate(10);
        return view('page.daftar', compact('anime'));
    }

    public function single($id)
    {
        $anime = Anime::findOrFail($id);
        return view('page.single', compact('anime'));
    }

    public function sortir($id)
    {
        $anime = Anime::where('id_jenis', $id)->get();
        $jenis = Jenis::all(); 
        return view('welcome', compact('anime', 'jenis'));
    }
}
