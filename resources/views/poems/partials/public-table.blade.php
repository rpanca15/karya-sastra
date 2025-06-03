<table class="table table-striped table-hover" id="poem-table">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Genre</th>
            <th>Ilustrasi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($poems as $index => $poem)
            <tr onclick="window.location='{{ route('poems.show', $poem->id) }}'" style="cursor:pointer;">
                <td>{{ $loop->iteration }}</td>
                <td class="title">{{ $poem->title }}</td>
                <td class="author">{{ $poem->author }}</td>
                <td class="genre">{{ $poem->genre }}</td>
                <td>
                    @if ($poem->image)
                        <img src="{{ asset('storage/' . $poem->image) }}" class="img-thumbnail" style="max-width: 50px">
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Tidak ada karya ditemukan.</td></tr>
        @endforelse
    </tbody>
</table>
