<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function create()
    {

        $risks = Risk::all();
        return view('risks.create');
        
    }

    public function show(Risk $risk)
    {
        return view('risks.show', compact('risk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'description' => 'required|string|max:255',
            'severity' => 'required|integer|min:1|max:10',   // Validasi agar tidak lebih dari 10
            'occurrence' => 'required|integer|min:1|max:10', // Validasi agar tidak lebih dari 10
            'detection' => 'required|integer|min:1|max:10',  // Validasi agar tidak lebih dari 10
        ]);
    
        // Create the new risk
        $risk = Risk::create($request->all());
    
        // Calculate the RPN and save it
        $risk->rpn = $risk->calculateRpn();
        $risk->save();
    
        return redirect()->route('risks.index')->with('success', 'Risiko berhasil ditambahkan!');
    }    

    public function index()
    {
        // Ambil hanya 10 risiko
        $risks = Risk::take(10)->get();
        
        // Menghitung Pareto dan menambahkannya ke risiko
        $risks = $this->calculatePareto($risks);
        
        return view('risks.index', compact('risks'));
    }

    public function edit(Risk $risk)
    {
        return view('risks.edit', compact('risk'));
    }

    public function update(Request $request, Risk $risk)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'severity' => 'required|integer',
            'occurrence' => 'required|integer',
            'detection' => 'required|integer',
        ]);

        $risk->update($request->all());
        $risk->rpn = $risk->calculateRpn();
        $risk->save();

        return redirect()->route('risks.index')->with('success', 'Risiko berhasil diperbarui!');
    }

    public function destroy(Risk $risk)
    {
        $risk->delete();
        return redirect()->route('risks.index')->with('success', 'Risiko berhasil dihapus!');
    }

    public function calculatePareto($risks)
    {
        // Hitung total RPN untuk semua risiko
        $totalRpn = $risks->sum(function($risk) {
            return $risk->calculateRpn(); // Menghitung RPN untuk setiap risiko
        });
        
        // Menghitung Pareto dan menambahkannya ke setiap risiko
        $risks->each(function($risk) use ($totalRpn) {
            $risk->paretoPercentage = ($risk->calculateRpn() / $totalRpn) * 100;
        });

        // Kembalikan risiko dengan informasi Pareto
        return $risks;
    }

    public function showDashboard()
    {
        $risks = Risk::all(); // Fetch all risks from the database
        return view('dashboard', compact('risks')); // Pass risks to the dashboard view
    }
}