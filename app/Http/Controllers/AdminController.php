<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Livre;
use App\Models\Membre;
use App\Models\Auteur;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Email ou mot de passe incorrect');
        }

        session(['admin_id' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }

    public function dashboard()
{
    $topLivres = Emprunt::selectRaw('livre_id, COUNT(*) as total')
    ->groupBy('livre_id')
    ->orderByDesc('total')
    ->take(5)
    ->with('livre')
    ->get();

    // Compter les emprunts par mois
    $empruntsParMois = Emprunt::selectRaw('COUNT(*) as total, MONTH(date_emprunt) as mois')
        ->groupBy('mois')
        ->orderBy('mois')
        ->get();

    return view('admin.dashboard', [
        'totalLivres' => Livre::count(),
        'totalAuteurs' => Auteur::count(),
        'totalMembres' => Membre::count(),
        'totalEmprunts' => Emprunt::count(),
        'empruntsEnCours' => Emprunt::where('statut', 'en_cours')->count(),
        'retards' => Emprunt::where('statut', 'retard')->count(),
        'empruntsParMois' => $empruntsParMois,
        'topLivres' => $topLivres,
    ]);
    
}

}
