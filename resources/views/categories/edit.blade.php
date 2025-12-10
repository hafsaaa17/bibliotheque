@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Modifier Catégorie</h2>

<form action="{{ route('categories.update', $categorie->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Libellé</label>
        <input type="text" class="form-control" name="libelle"
               value="{{ $categorie->libelle }}" required>
    </div>

    <button class="btn btn-success">Modifier</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection