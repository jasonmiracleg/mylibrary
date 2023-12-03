<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'user_id', 'book_id', 'book_amount'];

    public function sold(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
