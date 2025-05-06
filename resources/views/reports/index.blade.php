@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Laporan Pengaduan</h3>
    <h4 class="mb-4">Mahasiswa</h4>
    <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">Create</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($reports as $report)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $report->user->name }}</td>
                <td>{{ $report->description }}</td>
                <td>
                    @if ($report->photo)
                        <img src="{{ asset('storage/' . $report->photo) }}" width="60">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <span class="badge bg-{{ $report->status == 'menunggu' ? 'secondary' : ($report->status == 'diproses' ? 'warning' : 'success') }}">
                        {{ ucfirst($report->status) }}
                    </span>
                </td>
                <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <form action="{{ route('reports.destroy', $report->id) }}", method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Belum ada laporan.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
