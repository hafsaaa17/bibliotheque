<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1600&q=80')
                        no-repeat center center fixed;
            background-size: cover;
        }

        /* Carte floue sombre */
        .login-card {
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 40px;
            width: 420px;
            color: #f1f1f1;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35);
        }

        h3 {
            font-weight: bold;
            color: #fff;
        }

        label {
            font-weight: 600;
            color: #ddd;
        }

        .form-control-lg {
            background: rgba(255, 255, 255, 0.85);
            border: none;
            border-radius: 8px;
        }

        .btn-primary {
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-light {
            background: rgba(255,255,255,0.85);
            font-weight: 600;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="login-card">

        <h3 class="text-center mb-4">Connexion Admin</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.doLogin') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input class="form-control form-control-lg" type="email" name="email" required>
            </div>

            <div class="mb-3">
                <label>Mot de passe</label>
                <input class="form-control form-control-lg" type="password" name="password" required>
            </div>

            <button class="btn btn-primary w-100 mb-3">Se connecter</button>

            <a href="{{ url('/') }}" class="btn btn-light w-100">
                ⬅️ Retour à l'accueil
            </a>
        </form>

    </div>

</body>
</html>
