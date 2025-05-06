@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Detail Laporan</h3>

    <div class="card p-4 shadow-sm">
        <h5><strong>Pelapor:</strong> {{ $report->user->name }}</h5>
        <p><strong>Deskripsi:</strong><br>{{ $report->description }}</p>
        <p><strong>Status:</strong>
            <span class="badge bg-{{ $report->status == 'menunggu' ? 'secondary' : ($report->status == 'diproses' ? 'warning' : 'success') }}">
                {{ ucfirst($report->status) }}
            </span>
        </p>
        <p><strong>Waktu:</strong> {{ $report->created_at->format('d M Y - H:i') }}</p>
        @if ($report->photo)
            <p><strong>Foto:</strong><br>
                <img src="{{ asset('storage/' . $report->photo) }}" width="300">
            </p>
        @endif
    </div>
</div>
@endsection
