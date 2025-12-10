@extends('layouts.admin')

@section('content')
<head>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Modifier Emprunt</h2>

<form action="{{ route('emprunts.update', $emprunt->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Date Retour</label>
        <input type="date" class="form-control" name="date_retour"
               value="{{ $emprunt->date_retour }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Statut</label>
        <select class="form-select" name="statut">
            <option value="en_cours" {{ $emprunt->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
            <option value="retourne" {{ $emprunt->statut == 'retourne' ? 'selected' : '' }}>Retourné</option>
            <option value="retard" {{ $emprunt->statut == 'retard' ? 'selected' : '' }}>Retard</option>
        </select>
    </div>

    <button class="btn btn-success">Enregistrer</button>
    <a href="{{ route('emprunts.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection