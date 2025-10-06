@extends('layouts.main')
@section('content')
<h3 class="mb-4">Edit Tapcash</h3>
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
        <form method="POST" action="/dashboard/{{ $tapcash->id }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" name="no_tapcash" class="form-control" value="{{ $tapcash->no_tapcash }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="uid" class="form-control" value="{{ $tapcash->uid }}" required>
            </div>
            <div class="mb-3">
                <select name="tipe" class="form-control" required>
                    <option value="">Pilih tipe</option>
                    @foreach($tipe as $tp)
                        <option value="{{ $tp->nama_tipe }}" {{ $tapcash->tipe == $tp->nama_tipe ? 'selected' : '' }}>{{ $tp->nama_tipe }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="date" name="tanggal_expired" class="form-control" value="{{ $tapcash->tanggal_expired }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" value="{{ $tapcash->nama }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="npp" class="form-control" value="{{ $tapcash->npp }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="keterangan" class="form-control" value="{{ $tapcash->keterangan }}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="perusahaan" class="form-control" value="{{ $tapcash->perusahaan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status (Otomatis berdasarkan tanggal expired)</label>
                <input type="text" class="form-control" value="{{ $tapcash->status }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/dashboard" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
