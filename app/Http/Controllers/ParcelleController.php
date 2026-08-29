<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
public function index(Request $request)
{
    $q      = trim((string) $request->query('q'));
    $statut = $request->query('statut');

    $parcelles = Parcelle::query()
        ->when($q, fn ($query) => $query
            ->where('nom', 'like', "%{$q}%")
            ->orWhere('culture', 'like', "%{$q}%"))
        ->when($statut && $statut !== '', fn ($query) => $query
            ->where('statut', $statut))
        ->get();

    return view('parcelles.index', compact('parcelles', 'q', 'statut'));
}
    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('parcelles.create');
    }

    // Enregistrer une nouvelle parcelle
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'culture' => 'required',
        'superficie' => 'required|numeric',
        'date_plantation' => 'required|date',
        'statut' => 'required',
    ]);

    Parcelle::create($request->all());

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle ajoutée avec succès.');
}
    // Afficher une parcelle
    public function show(Parcelle $parcelle)
{
    return view('parcelles.show', compact('parcelle'));
}

    // Afficher le formulaire de modification
    public function edit(Parcelle $parcelle)
{
    return view('parcelles.edit', compact('parcelle'));
}

    // Modifier une parcelle
    public function update(Request $request, Parcelle $parcelle)
{
    $request->validate([
        'nom' => 'required',
        'culture' => 'required',
        'superficie' => 'required|numeric',
        'date_plantation' => 'required|date',
        'statut' => 'required',
    ]);

    $parcelle->update($request->all());

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle modifiée avec succès.');
}

    // Supprimer une parcelle
    public function destroy(Parcelle $parcelle)
{
    $parcelle->delete();

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle supprimée avec succès.');
}
}