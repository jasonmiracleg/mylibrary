<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'synopsis', 'writer_id', 'publisher_id'];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id', 'id');
    }
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function sold(): HasMany
    {
        return $this->hasMany(Sales::class, 'book_id', 'id');
    }
}
