@extends('layouts.admin')

@section('content')

<h2>Dashboard Administrateur</h2>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Total Livres</h5>
                <p class="card-text fs-2">{{ $totalLivres }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Total Auteurs</h5>
                <p class="card-text fs-2">{{ $totalAuteurs }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Total Membres</h5>
                <p class="card-text fs-2">{{ $totalMembres }}</p>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-4">
        <div class="card text-white bg-info mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Emprunts Totals</h5>
                <p class="card-text fs-2">{{ $totalEmprunts }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Retards</h5>
                <p class="card-text fs-2">{{ $retards }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-secondary mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">En cours</h5>
                <p class="card-text fs-2">{{ $empruntsEnCours }}</p>
            </div>
        </div>
    </div>

</div>
<hr>
<h3 class="mt-4">Statistique : Emprunts par mois</h3>

<canvas id="chartEmprunts"></canvas>

<script>
    const labels = [
        @foreach($empruntsParMois as $e)
            "{{ DateTime::createFromFormat('!m', $e->mois)->format('F') }}",
        @endforeach
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Nombre d\'emprunts',
            data: [
                @foreach($empruntsParMois as $e)
                    {{ $e->total }},
                @endforeach
            ],
            borderWidth: 2,
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)'
        }]
    };

    new Chart(document.getElementById('chartEmprunts'), {
        type: 'line',
        data: data,
    });
</script>
<hr>
<h3 class="mt-4">Top 5 des livres les plus empruntés</h3>

<canvas id="topLivresChart"></canvas>

<script>
    const livresLabels = [
        @foreach($topLivres as $item)
            "{{ $item->livre->titre }}",
        @endforeach
    ];

    const livresData = [
        @foreach($topLivres as $item)
            {{ $item->total }},
        @endforeach
    ];

    new Chart(document.getElementById('topLivresChart'), {
        type: 'bar',
        data: {
            labels: livresLabels,
            datasets: [{
                label: 'Nombre d\'emprunts',
                data: livresData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1
            }]
        }
    });
</script>

@endsection
