<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Membre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=1600&q=80')
                        no-repeat center center fixed;
            background-size: cover;
        }

        /* Carte floue (glass effect) */
        .login-card {
            background: rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 40px;
            width: 420px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
            color: #fff;
        }

        h2 {
            font-weight: bold;
        }

        .btn-primary {
            font-size: 1.1rem;
            padding: 10px;
            font-weight: 600;
        }

        .btn-light {
            font-weight: 600;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="login-card">

        <h2 class="text-center mb-4">Connexion Membre</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('membre.login.submit') }}" method="POST">
            @csrf

            <input type="email" 
                   name="email" 
                   placeholder="Email membre" 
                   class="form-control form-control-lg mb-3" 
                   required>

            <button class="btn btn-primary w-100 mb-3">Se connecter</button>

            <a href="{{ url('/') }}" class="btn btn-light w-100">
                ⬅️ Retour à l'accueil
            </a>
        </form>

    </div>

</body>
</html>
