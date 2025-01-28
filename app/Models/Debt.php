<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Debt extends Model
{
    /** @use HasFactory<\Database\Factories\DebtFactory> */
    use HasFactory;

    protected $fillable = [
        'debtor_id',
        'amount',
        'due_date',
        'description',
    ];

    public function debtor(): BelongsTo
    {
        return $this->belongsTo(Debtor::class, 'debtor_id');
    }
}
