
<div class="d-flex flex-column justify-content-between h-100" style="height:100vh;">
    <div>
        <div class="py-4 text-center">
            <h2 class="text-white">Tapcash</h2>
        </div>
        <nav class="nav flex-column px-3">
            <a class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-dark' : '' }}" href="/dashboard">Dashboard</a>
            <a class="nav-link text-white {{ request()->is('master-tipe') ? 'active bg-dark' : '' }}" href="/master-tipe">Master Tipe</a>
            <a class="nav-link text-white {{ request()->is('tambah-tapcash') ? 'active bg-dark' : '' }}" href="/tambah-tapcash">Tambah Tapcash</a>
                <a class="nav-link text-white {{ request()->is('download-excel') ? 'active bg-dark' : '' }}" href="/download-excel">Download Excel</a>
        </nav>
    </div>
    <div class="p-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>
</div>
