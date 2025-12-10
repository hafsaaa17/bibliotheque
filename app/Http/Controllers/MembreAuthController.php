<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembreAuthController extends Controller
{
    public function showLogin()
    {
        return view('membre.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $membre = Membre::where('email', $request->email)->first();

        if (!$membre) {
            return back()->with('error', 'Email introuvable');
        }

        session(['membre_id' => $membre->id]);

        return redirect()->route('membre.dashboard');
    }

    public function logout()
    {
        session()->forget('membre_id');
        return redirect()->route('membre.login');
    }
    public function getAuthenticatedMember()
{
    return Membre::find(session('membre_id'));
}

}
