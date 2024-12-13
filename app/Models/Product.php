<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'unit_price',
    ];

    protected $casts = [
        'image' => 'array',

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
