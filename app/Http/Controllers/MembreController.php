<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::paginate(10);
        return view('membres.index', compact('membres'));
    }

    public function create()
    {
        return view('membres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:membres',
            'historique' => 'nullable'
        ]);

        Membre::create($request->all());

        return redirect()->route('membres.index')->with('success', 'Membre ajouté avec succès');
    }

    public function edit($id)
    {
        $membre = Membre::findOrFail($id);
        return view('membres.edit', compact('membre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'historique' => 'nullable'
        ]);

        $membre = Membre::findOrFail($id);
        $membre->update($request->all());

        return redirect()->route('membres.index')->with('success', 'Membre modifié avec succès');
    }

    public function destroy($id)
    {
        Membre::destroy($id);
        return redirect()->route('membres.index')->with('success', 'Membre supprimé avec succès');
    }
}
