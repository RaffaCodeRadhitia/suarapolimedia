@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Form Pengaduan Baru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Deskripsi Masalah</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Pendukung (opsional)</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <button class="btn btn-success">Kirim Laporan</button>
    </form>
</div>
@endsection
