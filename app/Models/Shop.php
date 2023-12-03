<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['shop_name', 'shop_address'];

    public function seller(): HasMany
    {
        return $this->hasMany(Sales::class, 'shop_id', 'id');
    }
}
