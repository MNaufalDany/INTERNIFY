<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use App\Models\Dudi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PklController extends Controller
{
    public function index()
    {
        $pkl = Pkl::orderBy('created_at')->paginate(5);
        return view('pkl.index', compact('pkl'));
    }


    public function create()
    {
        $data = Siswa::all();
        $data2 = Dudi::all();
        $pkl = Pkl::orderBy('created_at')->paginate(5);
        return view('pkl.create', compact('data', 'data2'));
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_siswa'     => 'required',
            'id_dudi'      => 'required',
            'tgl_masuk'    => 'required'
        ]);

        //create post
        Pkl::create([
            'id_siswa'     => $request->id_siswa,
            'id_dudi'          => $request->id_dudi,
            'tgl_masuk'       => $request->tgl_masuk
        ]);

        //redirect to siswa
        return redirect('pkl')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $pkl = Pkl::find($id);
        return view('pkl.detail', compact('pkl'));
    }

    public function edit($id)
    {
        $pkl = Pkl::findOrFail($id);
        return view('pkl.edit', compact('pkl'));
    }

    public function update(Request $request, Pkl $pkl)
    {
        $this->validate($request, [
            'tgl_keluar'     => 'required',
            'nilai'           => 'required'
        ]);

        // $dudi = Dudi::findOrFail($request->id);

        $pkl->update([
            'tgl_keluar'     => $request->tgl_keluar,
            'nilai'           => $request->nilai
        ]);

        return redirect('pkl')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    public function destroy(Pkl $pkl)
    {
        //$siswa = Siswa::find($request->id);
        // return $guru;
        $pkl->delete();

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
