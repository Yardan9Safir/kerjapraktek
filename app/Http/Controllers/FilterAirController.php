<?php

namespace App\Http\Controllers;

use App\Models\FilterAir;
use Illuminate\Http\Request;

class FilterAirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filterairs = FilterAir::all();
        return view('admin/filterair/index', compact('filterairs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/filterair/tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat'=> 'required',
            'deskripsi_alat'=> 'required',
            'stok_alat' => 'required|integer',
            'harga_alat' => 'required|integer'
        ]);

        FilterAir::create($request->all());

        return redirect()->route('filterair.index')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FilterAir $santri)
    {
        return view('admin/filterair/show', compact('filterair'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $filterair = FilterAir::findOrFail($id);
        $filterair->nama_alat = $request->nama_alat;
        $filterair->deskripsi_alat = $request->deskripsi_alat;
        $filterair->stok_alat = $request->stok_alat;
        $filterair->harga_alat = $request->harga_alat;
        $filterair->save();

        return redirect()->route('filterair.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilterAir $filterair)
    {
        $filterair->delete();

        return redirect()->route('filterair.index')
            ->with('success', 'Data deleted successfully.');
    }
}
