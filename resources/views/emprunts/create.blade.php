@extends('layouts.admin')

@section('content')
<head>
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<h2>Nouvel Emprunt</h2>

<form action="{{ route('emprunts.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Livre</label>
        <select class="form-select" name="livre_id" required>
            @foreach($livres as $l)
                <option value="{{ $l->id }}">{{ $l->titre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Membre</label>
        <select class="form-select" name="membre_id" required>
            @foreach($membres as $m)
                <option value="{{ $m->id }}">{{ $m->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date Emprunt</label>
        <input type="date" class="form-control" name="date_emprunt" required>
    </div>

    <button class="btn btn-success">Valider</button>
    <a href="{{ route('emprunts.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</body>
@endsection