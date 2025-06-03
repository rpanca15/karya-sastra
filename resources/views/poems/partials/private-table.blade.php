<table class="table table-striped table-hover" id="poem-table">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Genre</th>
            <th>Ilustrasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($poems as $index => $poem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="title">{{ $poem->title }}</td>
                <td class="author">{{ $poem->author }}</td>
                <td class="genre">{{ $poem->genre }}</td>
                <td>
                    @if ($poem->image)
                        <img src="{{ asset('storage/' . $poem->image) }}" class="img-thumbnail" style="max-width: 50px">
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('poems.show', $poem) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('poems.edit', $poem) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('poems.destroy', $poem) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Tidak ada karya ditemukan.</td></tr>
        @endforelse
    </tbody>
</table>
