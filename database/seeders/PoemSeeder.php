<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Alternatively, you can create specific poems manually
        \App\Models\Poem::create([
            'title' => 'The Road Not Taken',
            'author' => 'Robert Frost',
            'genre' => 'Nature',
            'content' => 'Two roads diverged in a yellow wood, And sorry I could not travel both...',
            'image' => null, // Assuming no image for this poem
            'user_id' => 1,
        ]);

        \App\Models\Poem::create([
            'title' => 'Still I Rise',
            'author' => 'Maya Angelou',
            'genre' => 'Inspirational',
            'content' => "You may write me down in history With your bitter, twisted lies...",
            'image' => null,
            'user_id' => 1,
        ]);

        \App\Models\Poem::create([
            'title' => 'Do Not Go Gentle into That Good Night',
            'author' => 'Dylan Thomas',
            'genre' => 'Villanelle',
            'content' => "Do not go gentle into that good night, Old age should burn and rave at close of day...",
            'image' => null,
            'user_id' => 2,
        ]);

        \App\Models\Poem::create([
            'title' => 'Ode to a Nightingale',
            'author' => 'John Keats',
            'genre' => 'Romantic',
            'content' => "My heart aches, and a drowsy numbness pains My sense, as though of hemlock I had drunk...",
            'image' => null,
            'user_id' => 2,
        ]);
        
        \App\Models\Poem::create([
            'title' => 'The Love Song of J. Alfred Prufrock',
            'author' => 'T.S. Eliot',
            'genre' => 'Modernist',
            'content' => "Let us go then, you and I, When the evening is spread out against the sky...",
            'image' => null,
            'user_id' => 2,
        ]);
    }
}
