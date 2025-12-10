@extends('layouts.admin')

@section('content')

<head>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

<h2>Liste des Auteurs</h2>

<a href="{{ route('auteurs.create') }}" class="btn btn-primary mb-3">Ajouter Auteur</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Biographie</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($auteurs as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->nom }}</td>
            <td>{{ $a->biographie }}</td>

            <td>

                <!-- Bouton Modifier -->
                <a href="{{ route('auteurs.edit', $a->id) }}"
                   class="btn btn-warning btn-sm"
                   style="border:none; border-radius:4px;">
                   Modifier
                </a>

                <!-- Bouton Supprimer -->
                <form action="{{ route('auteurs.destroy', $a->id) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Supprimer cet auteur ?');">

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
    {{ $auteurs->links() }}
</div>

</body>
@endsection
