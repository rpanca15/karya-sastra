@extends('layout')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="m-0">Daftar Karya Sastra</h2>
        </div>

        <div class="card-body">
            <form id="search-form" class="row g-2 mb-4">
                <div class="col-md-5 col-lg-4">
                    <input type="text" class="form-control" id="search-input" placeholder="Cari judul / penulis...">
                </div>

                <div class="col-md-4 col-lg-3">
                    <select class="form-select" id="genre-filter">
                        <option value="">-- Semua Genre --</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre }}">{{ $genre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-auto">
                    <button type="button" id="reset-btn" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-repeat me-1"></i>Reset
                    </button>
                </div>
            </form>

            <div class="table-responsive">
                @include('poems._table', ['poems' => $poems, 'showActions' => false])
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

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.clickable-row').forEach(function(row) {
                row.addEventListener('click', function() {
                    window.location = row.dataset.href;
                });
            });

            // Mencegah klik pada tombol dalam baris
            document.querySelectorAll('.no-click').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        });
    </script>
@endsection
