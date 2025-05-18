<?php

return [
    /**
     * you can overwrite any model and use your own
     */
    'models' => [
        'Invoice' => \LaraZeus\Pontus\Models\Invoices\Invoice::class,
        'InvoiceDetails' => \LaraZeus\Pontus\Models\Invoices\InvoiceDetails::class,
        'InvoiceTransactions' => \LaraZeus\Pontus\Models\Invoices\InvoiceTransactions::class,
        'Features' => \LaraZeus\Pontus\Enums\Features::class,
        'Intervals' => \LaraZeus\Pontus\Enums\Intervals::class,
    ],
];
