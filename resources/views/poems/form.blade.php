@extends('layout')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ isset($poem) ? 'Edit Karya' : 'Tambah Karya' }}</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ isset($poem) ? route('poems.update', $poem) : route('poems.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($poem)) @method('PUT') @endif

            <input type="text" name="user_id" value="{{ auth()->id() }}" hidden>
            
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" value="{{ $poem->title ?? '' }}" placeholder="Masukkan judul karya">
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" class="form-control" name="author" value="{{ $poem->author ?? '' }}" placeholder="Nama penulis">
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" value="{{ $poem->genre ?? '' }}" placeholder="Genre karya">
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Puisi</label>
                <textarea class="form-control" name="content" rows="6" placeholder="Tulis isi puisi...">{{ $poem->content ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Ilustrasi</label>
                <input type="file" class="form-control" name="image">
                @if(isset($poem) && $poem->image)
                    <img src="{{ asset('storage/' . $poem->image) }}" class="img-thumbnail mt-2" style="max-width: 120px;">
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('poems.my') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Batal
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i>{{ isset($poem) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
