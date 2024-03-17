<?php

namespace LaraZeus\Pontus\Models\Invoices;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Rinvex\Subscriptions\Models\PlanSubscription;

class Invoice extends Model
{
    protected $casts = [
        'due_date' => 'date',
        'exp_date' => 'date',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceDetails::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(InvoiceTransactions::class);
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(PlanSubscription::class, 'item_id', 'id');
    }
}
