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
            ['name' => 'hour', 'label' => __('zeus-pontus::plan.hour')],
            ['name' => 'day', 'label' => __('zeus-pontus::plan.day')],
            ['name' => 'week', 'label' => __('zeus-pontus::plan.week')],
            ['name' => 'month', 'label' => __('zeus-pontus::plan.month')],
            ['name' => 'year', 'label' => __('zeus-pontus::plan.year')],
        ];
    }
}
