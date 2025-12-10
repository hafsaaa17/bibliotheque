@extends('layouts.member')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">📘 Historique de mes emprunts</h2>

    <a href="{{ route('membre.dashboard') }}" class="btn btn-outline-primary">
        ⬅️ Retour au Dashboard
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Livre</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>Statut</th>
                </tr>
            </thead>

            <tbody>
                @foreach($emprunts as $e)
                <tr>
                    <td>{{ $e->livre->titre }}</td>
                    <td>{{ $e->date_emprunt }}</td>
                    <td>{{ $e->date_retour ?? '-' }}</td>
                    <td>
                        @if($e->statut == 'en_cours')
                            <span class="badge bg-warning text-dark">En cours</span>
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

        <div class="mt-3">
            {{ $emprunts->links() }}
        </div>

    </div>
</div>

@endsection
