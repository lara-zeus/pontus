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
            ['code' => 'users', 'label' => __('subscription.features.users')],
            ['code' => 'certificates', 'label' => __('subscription.features.certificates')],
            ['code' => 'cooperative_training', 'label' => __('subscription.features.cooperative_training')],
        ];
    }
}
