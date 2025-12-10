@extends('layouts.admin')

@section('content')

<head>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

<h2>Liste des Emprunts</h2>

<a href="{{ route('emprunts.create') }}" class="btn btn-primary mb-3">Nouvel Emprunt</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Livre</th>
            <th>Membre</th>
            <th>Date Emprunt</th>
            <th>Date Retour</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($emprunts as $e)
        <tr>
            <td>{{ $e->livre->titre }}</td>
            <td>{{ $e->membre->nom }}</td>
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

            <td>
                <!-- Modifier -->
                <a href="{{ route('emprunts.edit', $e->id) }}"
                   class="btn btn-warning btn-sm"
                   style="border:none; border-radius:4px;">
                    Modifier
                </a>

                <!-- Supprimer -->
                <form action="{{ route('emprunts.destroy', $e->id) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Supprimer cet emprunt ?');">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            style="border:none; border-radius:4px;">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $emprunts->links() }}
</div>

</body>
@endsection
