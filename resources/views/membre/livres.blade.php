@extends('layouts.member')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">📚 Liste des livres</h2>

    <a href="{{ route('membre.dashboard') }}" class="btn btn-outline-primary">
        ⬅️ Retour au Dashboard
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Disponibilité</th>
                </tr>
            </thead>

            <tbody>
                @foreach($livres as $l)
                <tr>
                    <td>{{ $l->titre }}</td>
                    <td>{{ $l->auteur->nom }}</td>
                    <td>{{ $l->categorie->libelle }}</td>
                    <td>
                        @if($l->nb_exemplaires > 0)
                            <span class="badge bg-success">Disponible</span>
                        @else
                            <span class="badge bg-danger">Indisponible</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $livres->links() }}
        </div>

    </div>
</div>

@endsection
