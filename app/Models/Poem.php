<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'puisi';
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'genre',
        'content',
        'image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    /**
     * Get the user that owns the poem.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
