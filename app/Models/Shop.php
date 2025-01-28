<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'owner_id',
    ];

    public function owner():BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function debtors(): HasMany
    {
        return $this->hasMany(Debtor::class);
    }
}
