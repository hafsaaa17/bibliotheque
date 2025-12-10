@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Ajouter un Auteur</h2>

<form action="{{ route('auteurs.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Biographie</label>
        <textarea class="form-control" name="biographie"></textarea>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('auteurs.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection