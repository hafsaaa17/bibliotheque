@extends('layouts.member')

@section('content')

<h2 class="mb-4 fw-bold">Bienvenue, {{ $membre->nom }} 👋</h2>

<div class="row g-4">

    <!-- Card 1: Livres -->
    <div class="col-md-4">
        <a href="{{ route('membre.livres') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm p-4 text-center h-100 dashboard-card">
                <div class="icon-circle bg-primary text-white mx-auto mb-3">
                    📚
                </div>
                <h4 class="fw-semibold">Consulter les livres</h4>
                <p class="text-muted">Voir tous les livres disponibles</p>
            </div>
        </a>
    </div>

    <!-- Card 2: Historique -->
    <div class="col-md-4">
        <a href="{{ route('membre.historique') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm p-4 text-center h-100 dashboard-card">
                <div class="icon-circle bg-secondary text-white mx-auto mb-3">
                    📘
                </div>
                <h4 class="fw-semibold">Historique</h4>
                <p class="text-muted">Consulter vos emprunts</p>
            </div>
        </a>
    </div>

    <!-- Card 3: Profil -->
    <div class="col-md-4">
        <a href="{{ route('membre.profil') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm p-4 text-center h-100 dashboard-card">
                <div class="icon-circle bg-success text-white mx-auto mb-3">
                    👤
                </div>
                <h4 class="fw-semibold">Mon Profil</h4>
                <p class="text-muted">Voir et gérer vos informations</p>
            </div>
        </a>
    </div>

</div>


@endsection

@push('styles')
<style>
    .dashboard-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 15px;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .icon-circle {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 28px;
    }
</style>
@endpush
