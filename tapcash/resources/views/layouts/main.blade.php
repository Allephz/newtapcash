<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tapcash App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #f5f7fa; }
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: #fff;
            padding-top: 40px;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 24px;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #34495e;
            color: #fff;
        }
        .sidebar h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar d-flex flex-column justify-content-between" style="min-height:100vh;">
            <div>
                <h2>Tapcash</h2>
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i>Dashboard
                </a>
                <a href="/master-tipe" class="{{ request()->is('master-tipe') ? 'active' : '' }}">
                    <i class="bi bi-list-ul me-2"></i>Master Tipe
                </a>
                <a href="/tambah-tapcash" class="{{ request()->is('tambah-tapcash') ? 'active' : '' }}">
                    <i class="bi bi-plus-square me-2"></i>Tambah Tapcash
                </a>
                <a href="/download-excel" class="{{ request()->is('download-excel') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-arrow-down me-2"></i>Download Excel
                </a>
            </div>
            <div class="mb-4 px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
        <div class="col-10 py-5">
            @yield('content')
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
