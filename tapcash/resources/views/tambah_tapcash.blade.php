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
                <input type="text" name="no_tapcash" class="form-control" placeholder="No Tapcash" required>
            </div>
            <div class="mb-3">
                <input type="text" name="uid" class="form-control" placeholder="Uid" required>
            </div>
            <div class="mb-3">
                <select name="tipe" class="form-control" required>
                    <option value="">Pilih tipe</option>
                    @foreach($tipe as $tp)
                        <option value="{{ $tp->nama_tipe }}">{{ $tp->nama_tipe }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="date" name="tanggal_expired" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input type="text" name="npp" class="form-control" placeholder="Npp" required>
            </div>
            <div class="mb-3">
                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
            </div>
            <div class="mb-3">
                <input type="text" name="perusahaan" class="form-control" placeholder="Perusahaan" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status (Otomatis berdasarkan tanggal expired)</label>
                <input type="text" class="form-control" value="" readonly placeholder="Status akan otomatis setelah disimpan">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
