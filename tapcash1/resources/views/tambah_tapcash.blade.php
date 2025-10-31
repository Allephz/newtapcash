@extends('layouts.main')
@section('content')
<h3 class="mb-4">Tambah Tapcash</h3>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/tambah-tapcash">
            @csrf
            <div class="mb-3">
                 <label for="no_tapcash" class="form-label">No Tapcash</label>
                 <input type="text" id="no_tapcash" name="no_tapcash" class="form-control" placeholder="No Tapcash" required>
            </div>
            <div class="mb-3">
                 <label for="uid" class="form-label">Uid</label>
                 <input type="text" id="uid" name="uid" class="form-control" placeholder="Uid" required>
            </div>
            <div class="mb-3">
                 <label for="tipe" class="form-label">Pilih tipe</label>
                 <select id="tipe" name="tipe" class="form-control" required>
                    <option value="">Pilih tipe</option>
                    @foreach($tipe as $tp)
                        <option value="{{ $tp->nama_tipe }}">{{ $tp->nama_tipe }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="mb-3">
                 <label for="tanggal_expired" class="form-label">Tanggal Expired</label>
                 <input type="date" id="tanggal_expired" name="tanggal_expired" class="form-control" required>
            </div>
            <div class="mb-3">
                 <label for="nama" class="form-label">Nama</label>
                 <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                 <label for="npp" class="form-label">Npp</label>
                 <input type="text" id="npp" name="npp" class="form-control" placeholder="Npp" required>
            </div>
            <div class="mb-3">
                 <label for="keterangan" class="form-label">Keterangan</label>
                 <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required>
            </div>
            <div class="mb-3">
                 <label for="perusahaan" class="form-label">Perusahaan</label>
                 <input type="text" id="perusahaan" name="perusahaan" class="form-control" placeholder="Perusahaan" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status (Otomatis berdasarkan tanggal expired)</label>
                 <input type="text" class="form-control" value="Status akan otomatis setelah disimpan" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
