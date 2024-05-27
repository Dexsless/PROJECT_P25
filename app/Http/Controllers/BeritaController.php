<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;
use App\Models\Kategori;
use App\Models\Berita;
use PDF;
use Storage;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::latest()->paginate(5);
        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        $penulis = Penulis::all();
        $kategori = Kategori::all();
        return view('berita.create', compact('penulis', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi_berita' => 'required|min:15',
            'tanggal' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;
        $berita->tanggal = $request->tanggal;
        $berita->status = $request->status;
        $berita->id_penulis = $request->id_penulis;
        $berita->id_kategori = $request->id_kategori;

        $image = $request->file('image');
        $image->storeAs('public/beritas', $image->hashName());
        $berita->image = $image->hashName();
        $berita->save();
        return redirect()->route('berita.index');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi_berita' => 'required|min:15',
            'tanggal' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi' => 'required|min:10',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;
        $berita->tanggal = $request->tanggal;
        $berita->status = $request->status;
        $berita->id_penulis = $request->id_penulis;
        $berita->id_kategori = $request->id_kategori;

        $image = $request->file('image');
        $image->storeAs('public/beritas', $image->hashName());
        $berita->image = $image->hashName();
        $berita->save();
        return redirect()->route('berita.index');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::delete('public/beritas/' . $berita->image);
        $berita->delete();
        return redirect()->route('berita.index');
    }
}
