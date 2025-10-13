@extends('layouts.main')
@section('content')
<h3 class="mb-4">Daftar Tapcash</h3>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        No Tapcash
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="no_tapcash" class="form-control mb-2" placeholder="Cari No Tapcash..." value="{{ request('no_tapcash') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Uid
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="uid" class="form-control mb-2" placeholder="Cari Uid..." value="{{ request('uid') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Tipe
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="tipe" class="form-control mb-2" placeholder="Cari Tipe..." value="{{ request('tipe') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Tanggal Expired
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="tanggal_expired" class="form-control mb-2" placeholder="Cari Tanggal Expired..." value="{{ request('tanggal_expired') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Nama
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="nama" class="form-control mb-2" placeholder="Cari Nama..." value="{{ request('nama') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Npp
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="npp" class="form-control mb-2" placeholder="Cari Npp..." value="{{ request('npp') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Keterangan
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="keterangan" class="form-control mb-2" placeholder="Cari Keterangan..." value="{{ request('keterangan') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Perusahaan
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="perusahaan" class="form-control mb-2" placeholder="Cari Perusahaan..." value="{{ request('perusahaan') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                    <th>
                        Status
                        <div class="dropdown" style="display:inline-block; margin-left:5px;">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Search
                            </button>
                            <form method="GET" action="{{ url('/dashboard') }}" class="dropdown-menu p-2" style="min-width:200px;">
                                <input type="text" name="status" class="form-control mb-2" placeholder="Cari Status..." value="{{ request('status') }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Search</button>
                            </form>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($tapcash as $tc)
                <tr>
                    <td>{{ $tc->no_tapcash }}</td>
                    <td>{{ $tc->uid }}</td>
                    <td>{{ $tc->tipe }}</td>
                    <td>{{ $tc->tanggal_expired }}</td>
                    <td>{{ $tc->nama }}</td>
                    <td>{{ $tc->npp }}</td>
                    <td>{{ $tc->keterangan }}</td>
                    <td>{{ $tc->perusahaan }}</td>
                    <td>{{ $tc->status }}</td>
                    <td>
                        <a href="/dashboard/{{ $tc->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="/dashboard/{{ $tc->id }}" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
