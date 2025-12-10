@extends('layouts.admin')

@section('content')

<head>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

<h2>Liste des Livres</h2>

<a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Ajouter Livre</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>ISBN</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Nb Exemplaires</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($livres as $l)
        <tr>
            <td>{{ $l->id }}</td>
            <td>{{ $l->titre }}</td>
            <td>{{ $l->isbn }}</td>
            <td>{{ $l->auteur->nom }}</td>
            <td>{{ $l->categorie->libelle }}</td>
            <td>{{ $l->nb_exemplaires }}</td>

            <td>
                <!-- Modifier -->
                <a href="{{ route('livres.edit', $l->id) }}" 
                   class="btn btn-warning btn-sm"
                   style="border:none; border-radius:4px;">
                   Modifier
                </a>

                <!-- Supprimer -->
                <form action="{{ route('livres.destroy', $l->id) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Supprimer ce livre ?');">

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
    {{ $livres->links() }}
</div>

</body>
@endsection
