@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Modifier Auteur</h2>

<form action="{{ route('auteurs.update', $auteur->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="{{ $auteur->nom }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Biographie</label>
        <textarea class="form-control" name="biographie">{{ $auteur->biographie }}</textarea>
    </div>

    <button class="btn btn-success">Modifier</button>
    <a href="{{ route('auteurs.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection
