<?php

namespace LaraZeus\Pontus\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Features extends Model
{
    use Sushi;

    public function getRows(): array
    {
        return [
            ['code' => 'users', 'label' => __('zeus-pontus::plan.features.users')],
            ['code' => 'certificates', 'label' => __('zeus-pontus::plan.features.certificates')],
            ['code' => 'cooperative_training', 'label' => __('zeus-pontus::plan.features.cooperative_training')],
        ];
    }
}
