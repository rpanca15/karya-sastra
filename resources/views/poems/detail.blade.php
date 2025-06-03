@extends('layout')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="m-0">{{ $poem->title }}</h2>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Penulis:</strong> {{ $poem->author }}</p>
            <p class="mb-3"><strong>Genre:</strong> {{ $poem->genre }}</p>

            @if ($poem->image)
                <img src="{{ asset('storage/' . $poem->image) }}" class="img-thumbnail mb-3" style="max-width: 200px">
            @endif

            <div class="content bg-light p-3 rounded">
                {!! nl2br(e($poem->content)) !!}
            </div>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('poems.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection