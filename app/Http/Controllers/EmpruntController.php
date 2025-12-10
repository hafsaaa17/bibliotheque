<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\Membre;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::paginate(10);
        return view('emprunts.index', compact('emprunts'));
    }

    public function create()
    {
        $livres = Livre::all();
        $membres = Membre::all();
        return view('emprunts.create', compact('livres', 'membres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required',
            'membre_id' => 'required',
            'date_emprunt' => 'required|date'
        ]);

        Emprunt::create([
            'livre_id' => $request->livre_id,
            'membre_id' => $request->membre_id,
            'date_emprunt' => $request->date_emprunt,
            'statut' => 'en_cours'
        ]);

        return redirect()->route('emprunts.index')->with('success', 'Emprunt enregistré');
    }

    public function edit($id)
    {
        $emprunt = Emprunt::findOrFail($id);
        return view('emprunts.edit', compact('emprunt'));
    }

    public function update(Request $request, $id)
    {
        $emprunt = Emprunt::findOrFail($id);

        $request->validate([
            'date_retour' => 'nullable|date',
            'statut' => 'required'
        ]);

        $emprunt->update($request->all());

        return redirect()->route('emprunts.index')->with('success', 'Emprunt mis à jour');
    }

    public function destroy($id)
    {
        Emprunt::destroy($id);
        return redirect()->route('emprunts.index')->with('success', 'Emprunt supprimé');
    }
    public function historiquePourMembre()
{
    $membreId = session('membre_id');

    $emprunts = Emprunt::where('membre_id', $membreId)
        ->with('livre')
        ->paginate(10);

    return view('membre.historique', compact('emprunts'));
}

}
