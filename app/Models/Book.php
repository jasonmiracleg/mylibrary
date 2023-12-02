<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'synopsis', 'publisher'];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id', 'id');
    }
}
