@extends('layout')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="m-0">Tambah Karya</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('poems.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="author" placeholder="Penulis">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="genre" placeholder="Genre">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Isi puisi" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Ilustrasi</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('poems.my') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection