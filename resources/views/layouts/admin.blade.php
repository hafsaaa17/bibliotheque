<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Admin Panel</title>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 230px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
            padding-left: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
            width: 100%;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>📚 Bibliothèque</h3>

        <hr>

        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('auteurs.index') }}">✍️ Auteurs</a>
        <a href="{{ route('categories.index') }}">🏷️ Catégories</a>
        <a href="{{ route('livres.index') }}">📘 Livres</a>
        <a href="{{ route('membres.index') }}">👥 Membres</a>
        <a href="{{ route('emprunts.index') }}">📦 Emprunts</a>

        <hr>

        <a href="{{ route('admin.logout') }}" class="text-danger">🚪 Déconnexion</a>
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
