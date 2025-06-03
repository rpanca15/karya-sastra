@extends('layout')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="m-0">Karya Saya</h2>
            <a href="{{ route('poems.create') }}" class="btn btn-light">
                <i class="bi bi-plus-circle me-1"></i>Tambah Karya
            </a>
        </div>

        <div class="card-body">
            <form id="search-form" class="mb-4 d-flex gap-2 flex-wrap" onsubmit="return false;">
                <input type="text" class="form-control" id="search-input" placeholder="Cari judul / penulis...">

                <select class="form-select" id="genre-filter" style="max-width: 200px;">
                    <option value="">-- Semua Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre }}">{{ $genre }}</option>
                    @endforeach
                </select>

                <button type="button" id="reset-btn" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-repeat me-1"></i>Reset
                </button>
            </form>

            <div class="table-responsive">
                @include('poems.partials.private-table', ['poems' => $poems])
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const genreFilter = document.getElementById('genre-filter');
            const resetBtn = document.getElementById('reset-btn');

            function filterTable() {
                const keyword = searchInput.value.toLowerCase();
                const genre = genreFilter.value.toLowerCase();

                const tableRows = document.querySelectorAll('#poem-table tbody tr');

                tableRows.forEach(row => {
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';
                    const author = row.querySelector('.author')?.textContent.toLowerCase() || '';
                    const rowGenre = row.querySelector('.genre')?.textContent.toLowerCase() || '';

                    const matchSearch = title.includes(keyword) || author.includes(keyword);
                    const matchGenre = genre === '' || rowGenre === genre;

                    row.style.display = (matchSearch && matchGenre) ? '' : 'none';
                });
            }

            searchInput.addEventListener('input', filterTable);
            genreFilter.addEventListener('change', filterTable);
            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                genreFilter.value = '';
                filterTable();
            });

            filterTable(); // Panggil sekali untuk inisialisasi
        });
    </script>
@endsection
