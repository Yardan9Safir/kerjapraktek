<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::all();
        return view('admin/santri/index', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/santri/tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required',
            'nama' => 'required',
            'nama_wali' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tahun_masuk' => 'required|integer',
        ]);

        Santri::create($request->all());

        return redirect()->route('santri.index')
            ->with('success', 'Santri created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Santri $santri)
    {
        return view('admin/santri/show', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->nomor_induk = $request->nomor_induk;
        $santri->nama = $request->nama;
        $santri->nama_wali = $request->nama_wali;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->alamat = $request->alamat;
        $santri->tahun_masuk = $request->tahun_masuk;
        $santri->save();

        return redirect()->route('santri.index')->with('success', 'Santri updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Santri $santri)
    {
        $santri->delete();

        return redirect()->route('santri.index')
            ->with('success', 'Santri deleted successfully.');
    }
}
