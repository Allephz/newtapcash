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
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 16.6667%; /* col-2 Bootstrap, bisa diganti 250px */
            min-height: 100vh;
            background: linear-gradient(135deg, #232526 0%, #414345 100%);
            color: #fff;
            padding-top: 40px;
            box-shadow: 2px 0 16px 0 rgba(44,62,80,0.15);
            border-top-right-radius: 32px;
            border-bottom-right-radius: 32px;
            transition: background 0.3s;
            z-index: 100;
        }
        .sidebar a {
            color: #fff;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 28px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 12px;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }
        .sidebar a.active, .sidebar a:hover {
            background: linear-gradient(90deg, #00c6ff 0%, #0072ff 100%);
            color: #fff;
            transform: translateX(6px) scale(1.04);
            box-shadow: 0 2px 12px 0 rgba(0,114,255,0.10);
        }
        .sidebar h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 32px;
            text-align: center;
            letter-spacing: 2px;
            color: #00c6ff;
            text-shadow: 0 2px 8px rgba(0,198,255,0.15);
        }
        .sidebar img {
            filter: drop-shadow(0 2px 8px rgba(0,198,255,0.15));
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar d-flex flex-column justify-content-between" style="min-height:100vh;">
            <div>
                <div class="mb-3 text-center">
                    <img src="/Pelindo – Logo.jpeg" alt="Pelindo Logo" style="max-width:100px;max-height:80px;">
                </div>
                <h2>Tapcash</h2>
                <a href="/main-dashboard" class="{{ request()->is('main-dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i>Dashboard
                </a>
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-card-list me-2"></i>Daftar Tapcash
                </a>
                <a href="/master-tipe" class="{{ request()->is('master-tipe') ? 'active' : '' }}">
                    <i class="bi bi-list-ul me-2"></i>Master Tipe
                </a>
                <a href="/tambah-tapcash" class="{{ request()->is('tambah-tapcash') ? 'active' : '' }}">
                    <i class="bi bi-plus-square me-2"></i>Tambah Tapcash
                </a>
                <!-- Download control: pilih tipe atau unduh semua -->
                <div class="px-3 my-3">
                    <label class="small" style="color:#fff; font-weight:600;">Unduh Excel / CSV</label>
                    <div class="d-flex mt-2">
                        <select id="sidebarTipeSelect" class="form-select form-select-sm">
                            <option value="">Semua Tipe</option>
                            @foreach(\App\Models\Tipe::all() as $s)
                                <option value="{{ urlencode($s->nama_tipe) }}">{{ $s->nama_tipe }}</option>
                            @endforeach
                        </select>
                        <button id="sidebarDownloadBtn" class="btn btn-primary btn-sm ms-2">Unduh</button>
                    </div>
                </div>
            </div>
            <div class="mb-4 px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
    <div class="col-10 py-5" style="margin-left:16.6667%;">
            @yield('content')
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var btn = document.getElementById('sidebarDownloadBtn');
            if(btn){
                btn.addEventListener('click', function(){
                    var sel = document.getElementById('sidebarTipeSelect');
                    var val = sel ? sel.value : '';
                    if(!val) {
                        window.location.href = '/download-excel';
                    } else {
                        window.location.href = '/download-excel/tipe/' + val;
                    }
                });
            }
        });
    </script>
</body>
</html>
