<?php

namespace App\Http\Controllers;

use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PoemController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data puisi milik user yang login (jika dibatasi)
        // $query = Poem::where('user_id', auth()->id());
        // $search = $request->input('search');
        // $genre = $request->input('genre');

        // $poems = Poem::when($search, function ($query) use ($search) {
        //     $query->where(function ($q) use ($search) {
        //         $q->where('title', 'like', "%$search%")
        //             ->orWhere('content', 'like', "%$search%")
        //             ->orWhere('author', 'like', "%$search%");
        //     });
        // })
        //     ->when($genre, function ($query) use ($genre) {
        //         $query->where('genre', $genre);
        //     })
        //     ->orderByDesc('created_at')
        //     ->paginate(25)
        //     ->withQueryString();

        // // Ambil genre unik dari tabel puisi
        // $genres = Poem::select('genre')
        //     ->whereNotNull('genre')
        //     ->distinct()
        //     ->orderBy('genre')
        //     ->pluck('genre');

        // // Jika request AJAX (untuk search tanpa reload)
        // if ($request->ajax()) {
        //     return view('poems.partials.poem-table', compact('poems'))->render();
        // }

        $poems = Poem::orderByDesc('created_at')->get(); // tanpa filter
        $genres = Poem::select('genre')
            ->whereNotNull('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        // Tampilkan view utama
        return view('poems.index', compact('poems', 'genres'));
    }

    public function myPoems()
    {
        // Ambil puisi milik user yang login
        $poems = Poem::where('user_id', Auth::id())->orderByDesc('created_at')->get();
        $genres = Poem::select('genre')
            ->whereNotNull('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        return view('poems.karya-saya', compact('poems', 'genres'));
    }

    public function create()
    {
        return view('poems.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('illustrations', 'public');
        }

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        } else {
            $data['user_id'] = null;
        }

        Poem::create($data);
        return redirect()->route('poems.my');
    }

    public function show(Poem $poem)
    {
        return view('poems.detail', compact('poem'));
    }

    public function edit(Poem $poem)
    {
        return view('poems.edit', compact('poem'));
    }

    public function update(Request $request, Poem $poem)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'nullable',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($poem->image) {
                Storage::disk('public')->delete($poem->image);
            }
            $data['image'] = $request->file('image')->store('illustrations', 'public');
        }

        $poem->update($data);
        return redirect()->route('poems.my');
    }

    public function destroy(Poem $poem)
    {
        if ($poem->image) {
            Storage::disk('public')->delete($poem->image);
        }
        $poem->delete();
        return redirect()->route('poems.my');
    }
}
