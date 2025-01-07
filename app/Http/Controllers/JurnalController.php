<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnals = Jurnal::latest()->get();
        return view('admin.jurnal.index', ['jurnals' => $jurnals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tanggal' => 'required|date',
            'nm_jurnal' => 'required|min:3',
            'status' => 'required'
        ]);

        // Mengambil nama jurnal
        $nm_jurnal = $validateData['nm_jurnal'];

        // Pisahkan nama jurnal menjadi kata-kata
        $words = explode(' ', $nm_jurnal);

        // Ambil inisial dari kata pertama
        $initial1 = strtoupper(substr($words[0], 0, 1));

        // Ambil inisial dari kata kedua jika ada, atau tambahkan huruf acak
        $initial2 = isset($words[1]) ? strtoupper(substr($words[1], 0, 1)) : chr(rand(65, 90)); // Random A-Z jika tidak ada kata kedua

        // Ambil tanggal dan format ke dmY
        $formattedDate = date('dmY', strtotime($validateData['tanggal']));

        $formatWaktu = date('Hi');

        // Gabungkan inisial dan tanggal untuk membuat id_jurnal
        $validateData['id_jurnal'] = $initial1 . $initial2 . $formattedDate . $formatWaktu;

        // Simpan ke database
        Jurnal::create($validateData);

        return redirect('/admin/jurnal')->with('success', 'Jurnal berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        $jurnal = Jurnal::where('id_jurnal', $jurnal->id_jurnal)->first();

        if ($jurnal) {
            return response()->json([
                'success' => true,
                'data' => $jurnal,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Jurnal tidak ditemukan',
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        $jurnal = Jurnal::findOrFail($jurnal->id);
        return view('admin.jurnal.edit', compact('jurnal'));
    }

    /**
     * Status the specified resource in storage.
     */
    public function status(Request $request, Jurnal $jurnal)
    {
        $validateData = $request->validate([
            'status' => 'required',
        ]);

        $jurnal = Jurnal::findOrFail($jurnal->id);
        $jurnal->update($validateData);

        return redirect('/admin/jurnal')->with('success', 'Jurnal berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        $validateData = $request->validate([
            'tanggal' => 'required|date',
            'nm_jurnal' => 'required|min:3',
            'status' => 'required',
        ]);

        $jurnal = Jurnal::findOrFail($jurnal->id);
        $jurnal->update($validateData);

        return redirect('/admin/jurnal')->with('success', 'Jurnal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        $jurnal = Jurnal::findOrFail($jurnal->id);
        $jurnal->delete();

        return redirect('/admin/jurnal')->with('success', 'Jurnal berhasil dihapus!');
    }
}
