@extends('layout')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white py-3">
            <h2 class="h4 m-0">{{ $poem->title }}</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <span class="badge bg-secondary me-2">
                    <i class="bi bi-person"></i> {{ $poem->author }}
                </span>
                <span class="badge bg-info text-dark">
                    <i class="bi bi-tags"></i> {{ $poem->genre }}
                </span>
            </div>

            @if ($poem->image)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $poem->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 300px" alt="Gambar Puisi">
                </div>
            @endif

            <div class="p-4 bg-light rounded border">
                <p class="mb-0" style="white-space: pre-line; line-height: 1;">
                    {!! nl2br(e($poem->content)) !!}
                </p>
            </div>

            <div class="mt-4">
                <a href="javascript:history.back()" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
@endsection
