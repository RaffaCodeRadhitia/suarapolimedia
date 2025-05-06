@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="modern-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Daftar Laporan Pengaduan</h4>
                <small class="text-muted">Mahasiswa</small>
            </div>
            <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">+ Buat Laporan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table modern-table table-hover">
                <thead>
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
                                    <img src="{{ asset('storage/' . $report->photo) }}" width="60" class="modern-img">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="modern-badge {{
                                    $report->status == 'menunggu' ? 'bg-menunggu' :
                                    ($report->status == 'diproses' ? 'bg-diproses' : 'bg-selesai') }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
                            <td class="modern-action d-flex flex-wrap gap-1">
                                @if (session('user')->id == $report->user_id)
                                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                @endif

                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                                @if (session('user')->id == $report->user_id)
                                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">Belum ada laporan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
