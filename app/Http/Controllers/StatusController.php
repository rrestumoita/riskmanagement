<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Mitigations;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Show the form for creating a new status.
     */
    public function create()
    {
        // Ambil semua mitigasi yang tersedia
        $mitigations = Mitigations::all();
        return view('statuses.create', compact('mitigations'));
    }

    /**
     * Store a newly created status in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|in:implemented,in progress,completed,to do',
            'mitigations_id' => 'required|exists:mitigations,id', // Validasi bahwa mitigation_id valid
        ]);

        // Pastikan bahwa mitigation_id ada di data
        if (!$data['mitigations_id']) {
            // Atau berikan nilai default jika perlu
            $data['mitigations_id'] = 0; // Atau nilai default lainnya
        }

        Status::create($data);

        return redirect()->route('statuses.index')->with('success', 'Status mitigasi berhasil ditambahkan.');
    }



    /**
     * Display a listing of the statuses.
     */
    public function index()
    {
        // Ambil semua status
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for editing the specified status.
     */
    public function edit($id)
    {
        // Ambil status berdasarkan ID
        $status = Status::findOrFail($id);
        // Ambil semua mitigasi yang tersedia
        $mitigations = Mitigations::all();
        return view('statuses.edit', compact('status', 'mitigations'));
    }

    /**
     * Update the specified status in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $data = $request->validate([
            'status' => 'required|in:implemented,in progress,completed,to do', // Validasi status
            'mitigations_id' => 'required|exists:mitigations,id', // Pastikan mitigation_id valid
        ]);

        // Cari status berdasarkan ID dan update
        $status = Status::findOrFail($id);
        $status->update($data);

        // Redirect ke halaman index status dengan pesan sukses
        return redirect()->route('statuses.index')->with('success', 'Status mitigasi berhasil diperbarui.');
    }

    /**
     * Remove the specified status from storage.
     */
    public function destroy($id)
    {
        // Cari status berdasarkan ID dan hapus
        $status = Status::findOrFail($id);
        $status->delete();

        // Redirect ke halaman index status dengan pesan sukses
        return redirect()->route('statuses.index')->with('success', 'Status mitigasi berhasil dihapus.');
    }
}
