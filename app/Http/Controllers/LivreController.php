<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::paginate(10);
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('livres.create', compact('auteurs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'isbn' => 'required|unique:livres',
            'nb_exemplaires' => 'required|integer',
            'categorie_id' => 'required',
            'auteur_id' => 'required'
        ]);

        Livre::create($request->all());

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès');
    }

    public function edit($id)
    {
        $livre = Livre::findOrFail($id);
        $auteurs = Auteur::all();
        $categories = Categorie::all();

        return view('livres.edit', compact('livre', 'auteurs', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'nb_exemplaires' => 'required|integer',
            'categorie_id' => 'required',
            'auteur_id' => 'required'
        ]);

        $livre = Livre::findOrFail($id);
        $livre->update($request->all());

        return redirect()->route('livres.index')->with('success', 'Livre modifié avec succès');
    }

    public function destroy($id)
    {
        Livre::destroy($id);
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès');
    }
    public function listePourMembre()
{
    $livres = Livre::with(['auteur', 'categorie'])->paginate(10);
    return view('membre.livres', compact('livres'));
}

}
