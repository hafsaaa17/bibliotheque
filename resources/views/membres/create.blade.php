@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Ajouter un Membre</h2>

<form action="{{ route('membres.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Historique</label>
        <textarea class="form-control" name="historique"></textarea>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('membres.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection