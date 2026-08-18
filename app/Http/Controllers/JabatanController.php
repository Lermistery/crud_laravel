<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.index', compact('jabatans'));
    }

    public function store(StoreJabatanRequest $request)
    {
        $validated = $request->validated();
        Jabatan::create($validated);
        
        return redirect('/jabatan')->with ('success', 'Jabatan berhasil ditambahkan!');
    }

    public function update(UpdateJabatanRequest $request, $id)
    {
        $validated = $request->validated();
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($validated);

        return redirect('/jabatan')->with('success', 'Jabatan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect('/jabatan')->with('success', 'Jabatan berhasil dihapus!');
    }
}
