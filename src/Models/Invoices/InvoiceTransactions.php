<?php

namespace LaraZeus\Pontus\Models\Invoices;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaraZeus\Chaos\Concerns\ChaosModel;

class InvoiceTransactions extends Model
{
    use ChaosModel;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
