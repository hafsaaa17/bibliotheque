<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque - Membre</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Navbar Gradient */
        .navbar-custom {
            background: linear-gradient(90deg, #0d6efd, #0056d6);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        /* Member badge */
        .member-badge {
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Container spacing */
        .page-wrapper {
            padding: 25px 10px 40px;
        }

        /* Logout button */
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.35) !important;
            color: #fff !important;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container-fluid">

            <span class="navbar-brand fw-bold">
                📚 Bibliothèque – Espace Membre
            </span>

            <div class="ms-auto d-flex align-items-center gap-3">

                <!-- Authenticated Member Display -->
                <span class="member-badge">
                    👤 {{ \App\Models\Membre::find(session('membre_id'))->nom ?? 'Membre' }}
                </span>

                <!-- Logout -->
                <a href="{{ route('membre.logout') }}" 
                   class="btn btn-outline-light btn-sm logout-btn">
                    Déconnexion
                </a>
            </div>

        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <div class="container page-wrapper">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
