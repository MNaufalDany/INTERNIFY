<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    public function index()
    {
        $dudi = Dudi::orderBy('nama')->paginate(5);
        return view('dudi.index', compact('dudi'));
    }


    public function create()
    {
        $dudi = Dudi::orderBy('nama')->paginate(5);
        return view('dudi.create', compact('dudi'));
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'ceo'      => 'required|min:5',
            'alamat'   => 'required|min:5'
        ]);

        //create post
        Dudi::create([
            'nama'     => $request->nama,
            'ceo'      => $request->ceo,
            'alamat'    => $request->alamat
        ]);

        //redirect to siswa
        return redirect('dudi')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $dudi = Dudi::findOrFail($id);
        return view('dudi.edit', compact('dudi'));
    }

    public function update(Request $request, Dudi $dudi)
    {
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'ceo'      => 'required|min:5',
            'alamat'   => 'required|min:5'
        ]);

        // $dudi = Dudi::findOrFail($request->id);

        $dudi->update([
            'nama'     => $request->nama,
            'ceo'      => $request->ceo,
            'alamat'    => $request->alamat
        ]);

        return redirect('dudi')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    public function destroy(Dudi $dudi)
    {
        //$siswa = Siswa::find($request->id);
        // return $guru;
        $dudi->delete();

        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
