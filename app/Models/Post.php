<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use Prunable;

    public $table = 'posts';

    public $fillable = [
        'title',
        'user_id',
        'likes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonth());
    }

    protected function pruning(): void
    {
        Log::info('Pruning post: ' . $this->id);
    }
}
