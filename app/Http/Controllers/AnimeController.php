<?php
namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class AnimeController extends Controller
{
    public function index()
    {
        $anime = Anime::all();
        return view('anime.index', compact('anime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('anime.create', compact('jenis'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama_anime'      => 'required',
        //     'genre'          => 'required',
        //     'harga'          => 'required|numeric',
        //     'stock'          => 'required|numeric',
        //     'penerbit'       => 'required',
        //     'tanggal_terbit' => 'required',
        //     'foto'          => 'required|mimes:jpg,png|max:1024',
        // ]);

        $anime           = new Anime();
        $anime->judul    = $request->judul;
        $anime->id_jenis = $request->id_jenis;
        $anime->desk     = $request->desk;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name  = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('storage/anim', $name);
            $anime->foto = $name;
        }
        $anime->penulis = $request->penulis;

        // $image                = $request->file('foto');
        // $image->storeAs('public/anime', $image->hashName());
        // $anime->foto = $image->hashName();
        $anime->save();
        return redirect()->route('anime.index')->with('success', 'Data Berhasil Disimpan!');

    }
//|unique:animesx
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::findOrfail($id);
        return view('anime.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = Anime::findOrfail($id);
        $jenis = Jenis::all();
        return view('anime.edit', compact('anime', 'jenis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'judul'    => 'required',
        //     'id_jenis' => 'required',
        //     'desk'     => 'required|string',
        //     'foto'     => 'nullable|mimes:jpg,png|max:1024',
        //     'penulis'  => 'required',
        // ]);

        $anime           = Anime::findOrfail($id);
        $anime->judul    = $request->judul;
        $anime->id_jenis = $request->id_jenis;
        $anime->desk     = $request->desk;
        if ($request->hasFile('foto')) {
            $anime->deleteImage();
            $image = $request->file('foto');
            $name  = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('storage/anim', $name);
            $anime->foto = $name;
        }
        $anime->penulis = $request->penulis;

        //Update Image
        // if ($request->hasFile('foto')) {
        //     //hapus gambar jika ada
        //     if ($anime->foto && Storage::exists('public/anime/' . $anime->foto)) {
        //         Storage::delete('public/anime'. $anime);
        //     }
        //     //upload new image
        //     $image = $request->file('foto');
        //     $image->storeAs('public/anime', $image->hashName());
        //     $anime->foto = $image->hashName();
        // }
        $anime->save();
        return redirect()->route('anime.index')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anime = Anime::findOrfail($id);
        //hapus gambar lama Jika ada
        if ($anime->foto && Storage::exists('public/anim/' . $anime->foto)) {
            Storage::delete('public/anim/' . $anime->foto);
        }
        $anime->delete();
        return redirect()->route('anime.index')->with('danger', 'Data Berhasil Dihapus!');
    }
}
