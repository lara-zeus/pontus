<?php

namespace LaraZeus\Pontus\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use LaraZeus\Pontus\Filament\Resources\PlanSubscriptionResource\Pages\CreatePlanSubscription;
use LaraZeus\Pontus\Filament\Resources\PlanSubscriptionResource\Pages\EditPlanSubscription;
use LaraZeus\Pontus\Filament\Resources\PlanSubscriptionResource\Pages\ListPlanSubscriptions;
use Rinvex\Subscriptions\Models\PlanSubscription;

class PlanSubscriptionResource extends PontusResource
{
    protected static ?string $model = PlanSubscription::class;

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('plan_id')
                ->required(),
            TextInput::make('subscriber_type')
                ->required()
                ->maxLength(255),
            TextInput::make('subscriber_id')
                ->required(),
            TextInput::make('slug')
                ->required()
                ->maxLength(255),
            Textarea::make('name')
                ->required(),
            Textarea::make('description'),
            TextInput::make('subscription_type')
                ->required()
                ->maxLength(255),
            DateTimePicker::make('trial_ends_at'),
            DateTimePicker::make('starts_at'),
            DateTimePicker::make('ends_at'),
            DateTimePicker::make('cancels_at'),
            DateTimePicker::make('canceled_at'),
            TextInput::make('timezone')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('plan_id'),
            TextColumn::make('subscriber_type'),
            TextColumn::make('subscriber_id'),
            TextColumn::make('slug'),
            TextColumn::make('name'),
            TextColumn::make('description'),
            TextColumn::make('subscription_type'),
            TextColumn::make('trial_ends_at')->dateTime(),
            TextColumn::make('starts_at')->dateTime(),
            TextColumn::make('ends_at')->dateTime(),
            TextColumn::make('cancels_at')->dateTime(),
            TextColumn::make('canceled_at')->dateTime(),
            TextColumn::make('timezone'),
            TextColumn::make('created_at')->dateTime(),
            TextColumn::make('updated_at')->dateTime(),
            TextColumn::make('deleted_at')->dateTime(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlanSubscriptions::route('/'),
            'create' => CreatePlanSubscription::route('/create'),
            'edit' => EditPlanSubscription::route('/{record}/edit'),
        ];
    }
}
