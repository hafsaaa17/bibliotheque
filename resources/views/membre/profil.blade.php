@extends('layouts.member')

@section('content')

@php
    $membre = $membre ?? \App\Models\Membre::find(session('membre_id'));
@endphp

<div class="card shadow p-4 mb-4">
    <h3 class="mb-3">👤 Profil Membre</h3>

    <p><strong>Nom :</strong> {{ $membre->nom }}</p>
    <p><strong>Email :</strong> {{ $membre->email }}</p>

    <p><strong>Nombre total d'emprunts :</strong> 
        {{ $membre->emprunts()->count() }}
    </p>

    <a href="{{ route('membre.profil.historique') }}" class="btn btn-secondary mt-2">
        Voir mon historique complet
    </a>
</div>

<hr>

<h4 class="mt-4">Mes derniers emprunts</h4>

<table class="table table-striped table-bordered shadow-sm">
    <thead class="table-secondary">
        <tr>
            <th>Livre</th>
            <th>Date Emprunt</th>
            <th>Date Retour</th>
            <th>Statut</th>
        </tr>
    </thead>

    <tbody>
        @foreach(
            $membre->emprunts()->latest()->take(5)->get() as $e
        )
        <tr>
            <td>{{ $e->livre->titre }}</td>
            <td>{{ $e->date_emprunt }}</td>
            <td>{{ $e->date_retour ?? '-' }}</td>
            <td>
                @if($e->statut == 'en_cours')
                    <span class="badge bg-warning">En cours</span>
                @elseif($e->statut == 'retourne')
                    <span class="badge bg-success">Retourné</span>
                @else
                    <span class="badge bg-danger">Retard</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
