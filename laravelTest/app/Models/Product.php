<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
