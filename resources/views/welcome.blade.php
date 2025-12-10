<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque - Accueil</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4?auto=format&fit=crop&w=1600&q=80')
                        no-repeat center center fixed;
            background-size: cover;
        }

        /* Carte floue */
        .welcome-card {
            background: rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 45px;
            width: 30rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.20);
            color: #fff;
        }

        h2 {
            font-weight: bold;
        }

        .btn-lg {
            font-size: 1.2rem;
            font-weight: 600;
            padding: 12px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="welcome-card text-center">

        <h2 class="mb-4">Bienvenue à la Bibliothèque</h2>

        <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg mb-3 w-100">
            Espace Administrateur
        </a>

        <a href="{{ route('membre.login') }}" class="btn btn-success btn-lg w-100">
            Espace Membre
        </a>

    </div>

</body>
</html>
