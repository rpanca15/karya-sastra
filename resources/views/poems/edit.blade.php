@extends('layout')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="m-0">Edit Karya</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('poems.update', $poem) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" value="{{ $poem->title }}">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="author" value="{{ $poem->author }}">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="genre" value="{{ $poem->genre }}">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="content" rows="5">{{ $poem->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Ilustrasi</label>
                    <input type="file" class="form-control" name="image">
                    @if ($poem->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $poem->image) }}" class="img-thumbnail"
                                style="max-width: 100px">
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('poems.my') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
