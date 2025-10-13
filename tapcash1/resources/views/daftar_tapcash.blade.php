
@extends('layouts.main')
@section('content')
<h2 class="mb-4">Dashboard Tapcash</h2>
<div class="card rounded-4 shadow-sm" style="background:#f3f4f8;">
    <div class="card-body">
        <table class="table table-bordered align-middle" style="background:#fff;">
            <thead>
                <tr style="background:#f5f6fa; color:#222;">
                    <th>No Tapcash<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Uid<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Tipe<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Tanggal Expired<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Nama<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Npp<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Keterangan<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Perusahaan<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th>Status<br><button class="btn btn-secondary btn-sm">Search</button></th>
                    <th></th>
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
                        <a href="/dashboard/{{ $tc->id }}/edit" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <form action="/dashboard/{{ $tc->id }}" method="POST" style="display:inline;">
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
