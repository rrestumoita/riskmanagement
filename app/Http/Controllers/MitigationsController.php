<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\Mitigations;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MitigationsController extends Controller
{
    /**
     * Display a listing of the mitigations.
     */
    public function index(): View
    {
        $mitigations = Mitigations::all();
        return view('mitigations.index', compact('mitigations'));
    }

    /**
     * Show the form for creating a new mitigation.
     */
    public function create(): View
    {
        $risks = Risk::all();// Fetch all risks for the dropdown
        return view('mitigations.create', compact('risks'));
    }

    /**
     * Store a newly created mitigation in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'action' => 'required|max:255',
            'priority' => 'required|in:High,Middle,Low',
            'description' => 'required|string|max:1000',
            'risks_id' => 'required|exists:risks,id', // Ensure risk_id exists in the risks table
        ]);

        Mitigations::create($data); // Create mitigation with validated data

        return redirect()->route('mitigations.index')
            ->with('success', 'Mitigation has been created successfully.');
    }

    /**
     * Show the form for editing the specified mitigation.
     */
    public function edit(Mitigations $mitigation): View
    {
        $risks = Risk::all(); // Fetch all risks for editing
        return view('mitigations.edit', compact('mitigation', 'risks'));
    }

    /**
     * Update the specified mitigation in storage.
     */
    public function update(Request $request, Mitigations $mitigation): RedirectResponse
    {
        $data = $request->validate([
            'action' => 'required|max:255',
            'priority' => 'required|in:High,Middle,Low',
            'description' => 'required|string|max:1000',
            'risks_id' => 'required|exists:risks,id', // Ensure valid risk_id
        ]);

        $mitigation->update($data);

        return redirect()->route('mitigations.index')
            ->with('success', 'Mitigation has been updated successfully.');
    }

    /**
     * Remove the specified mitigation from storage.
     */
    public function destroy(Mitigations $mitigation): RedirectResponse
    {
        $mitigation->delete();

        return redirect()->route('mitigations.index')
            ->with('success', 'Mitigation has been deleted successfully.');
    }
}
