<?php

namespace LaraZeus\Pontus\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Intervals extends Model
{
    use Sushi;

    public function getRows(): array
    {
        return [
            ['name' => 'hour', 'label' => __('subscription.hour')],
            ['name' => 'day', 'label' => __('subscription.day')],
            ['name' => 'week', 'label' => __('subscription.week')],
            ['name' => 'month', 'label' => __('subscription.month')],
            ['name' => 'year', 'label' => __('subscription.year')],
        ];
    }
}
