<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;
use Storage;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::latest()->paginate(5);
        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'email' => 'required',
        ]);

        $penulis = new Penulis();
        $penulis->nama = $request->nama;
        $penulis->email = $request->email;

        $penulis->save();
        return redirect()->route('penulis.index');
    }

    public function show($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.show', compact('penulis'));
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'email' => 'required',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->nama = $request->nama;
        $penulis->email = $request->email;

        $penulis->save();
        return redirect()->route('penulis.index');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        Storage::delete('public/penuliss/' . $penulis->image);
        $penulis->delete();
        return redirect()->route('penulis.index');
    }
}



