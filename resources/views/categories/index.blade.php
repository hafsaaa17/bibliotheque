@extends('layouts.admin')

@section('content')

<head>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

<h2>Liste des Catégories</h2>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter Catégorie</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($categories as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->libelle }}</td>

            <td>
                <!-- Modifier -->
                <a href="{{ route('categories.edit', $c->id) }}" 
                   class="btn btn-warning btn-sm"
                   style="border:none; border-radius:4px;">
                   Modifier
                </a>

                <!-- Supprimer -->
                <form action="{{ route('categories.destroy', $c->id) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Supprimer cette catégorie ?');">

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
    {{ $categories->links() }}
</div>

</body>
@endsection
