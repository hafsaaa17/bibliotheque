@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Ajouter un Livre</h2>

<form action="{{ route('livres.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" class="form-control" name="titre" required>
    </div>

    <div class="mb-3">
        <label class="form-label">ISBN</label>
        <input type="text" class="form-control" name="isbn" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre d'exemplaires</label>
        <input type="number" class="form-control" name="nb_exemplaires" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Auteur</label>
        <select class="form-select" name="auteur_id" required>
            <option value="">-- Choisir un auteur --</option>
            @foreach($auteurs as $a)
                <option value="{{ $a->id }}">{{ $a->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Catégorie</label>
        <select class="form-select" name="categorie_id" required>
            <option value="">-- Choisir une catégorie --</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->libelle }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection