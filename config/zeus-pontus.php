<?php

use LaraZeus\Pontus\Enums\Features;
use LaraZeus\Pontus\Enums\Intervals;
use LaraZeus\Pontus\Models\Invoices\Invoice;
use LaraZeus\Pontus\Models\Invoices\InvoiceDetails;
use LaraZeus\Pontus\Models\Invoices\InvoiceTransactions;

return [
    /**
     * you can overwrite any model and use your own
     */
    'models' => [
        'Invoice' => Invoice::class,
        'InvoiceDetails' => InvoiceDetails::class,
        'InvoiceTransactions' => InvoiceTransactions::class,
        'Features' => Features::class,
        'Intervals' => Intervals::class,
    ],
];
