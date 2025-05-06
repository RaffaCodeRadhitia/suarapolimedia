@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">Back</a>
    <h3 class="mb-4">Edit Laporan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required readonly>{{ $report->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (kosongkan jika tidak diubah)</label><br>
            @if ($report->photo)
                <img src="{{ asset('storage/' . $report->photo) }}" width="100" class="mb-2">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="menunggu" {{ $report->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai"  {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
