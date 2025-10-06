@extends('layouts.main')
@section('content')
<h3 class="mb-4">Master Tipe</h3>
<div class="mb-4">
    <form method="POST" action="/master-tipe">
        @csrf
        <div class="input-group mb-3" style="max-width:400px;">
            <input type="text" name="nama_tipe" class="form-control" placeholder="Nama tipe baru" required>
            <button class="btn btn-primary" type="submit">Tambah Tipe</button>
        </div>
    </form>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipe as $i => $tp)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $tp->nama_tipe }}</td>
                    <td>
                        <form method="POST" action="/master-tipe/{{ $tp->id }}" onsubmit="return confirm('Yakin ingin menghapus tipe ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
