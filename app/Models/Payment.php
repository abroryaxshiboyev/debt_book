<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $fillable = [
        'debtor_id',
        'amount',
        'payment_date',
    ];

    public function debtor(): BelongsTo
    {
        return $this->belongsTo(Debtor::class, 'debtor_id');
    }
}
