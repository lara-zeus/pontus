<?php

namespace LaraZeus\Pontus\Filament\Resources;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use LaraZeus\Pontus\Filament\Resources\PlanResource\Pages;
use LaraZeus\Pontus\Filament\Resources\PlanResource\Pages\CreatePlan;
use LaraZeus\Pontus\Models\Features;
use LaraZeus\Pontus\Models\Intervals;
use Rinvex\Subscriptions\Models\Plan;

class PlanResource extends PontusResource
{
    protected static ?string $model = Plan::class;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema(
                [
                    Grid::make()->columnSpan(2)->schema([

                        Section::make(__('.nameAndDesc'))
                            ->columns()
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('slug')->required(),
                                RichEditor::make('description')->columnSpanFull(),
                            ]),

                        Repeater::make('plan_feature')
                            ->label(__('.plan_features'))
                            ->relationship('features')
                            ->columnSpanFull()
                            ->schema([
                                Grid::make()->schema([
                                    TextInput::make('name')
                                        ->required(),
                                    Select::make('slug')
                                        ->options(Features::pluck('label', 'code')),
                                ]),

                                RichEditor::make('description')->required()
                                    ->hint(__('.features_description_hint')),

                                Grid::make()->schema([
                                    TextInput::make('value')->required()
                                        ->hint(__('.plan_feature.for_static_plans')),
                                    TextInput::make('price')
                                        ->hint(__('.plan_feature.price_hint'))
                                        ->default(0)
                                        ->required(),
                                    TextInput::make('sort_order')
                                        ->required(),
                                ]),

                                Grid::make()->schema([
                                    TextInput::make('resettable_period')
                                        ->required(),
                                    Select::make('resettable_interval')
                                        ->options(Intervals::pluck('label', 'name')),
                                ]),
                            ]),
                    ]),

                    Grid::make()->columnSpan(1)->schema([
                        Section::make()
                            ->columns()
                            ->schema([
                                TextInput::make('price')->required()->default(0),
                                TextInput::make('signup_fee')->required()->default(0),
                                Select::make('subscription_model')
                                    ->columnSpanFull()
                                    ->default('PAYG')
                                    ->options([
                                        'PAYG' => __('subscription.PAYG'),
                                        'FIXED' => __('subscription.FIXED'),
                                    ]),
                            ]),

                        Section::make()
                            ->compact()
                            ->heading(__('.plans_invoice'))
                            ->schema([
                                TextInput::make('invoice_period')
                                    ->required()
                                    ->integer()
                                    ->default(1),
                                Select::make('invoice_interval')
                                    ->options(Intervals::pluck(
                                        'label',
                                        'name'
                                    ))
                                    ->default('month'),
                            ]),

                        Section::make()
                            ->label(__('.plans_trials'))
                            ->compact()
                            ->schema([
                                TextInput::make('trial_period')
                                    ->required()
                                    ->integer()
                                    ->default(15),
                                Select::make('trial_interval')
                                    ->options(Intervals::pluck('label', 'name'))
                                    ->default('day'),
                            ]),

                        Section::make()
                            ->compact()
                            ->label('.plans_grace')
                            ->schema([
                                TextInput::make('grace_period')->required()
                                    ->integer()
                                    ->default(15),
                                Select::make('grace_interval')
                                    ->label(__('subscription.grace_interval'))
                                    ->options(Intervals::pluck('label', 'name'))
                                    ->default('day'),
                            ]),

                        Section::make()
                            ->compact()
                            ->label('.plans_options')
                            ->schema([
                                TextInput::make('sort_order')->required()->integer(),
                                TextInput::make('currency')->default('SAR')->maxLength(3),
                                TextInput::make('active_subscribers_limit')->integer(),
                                Toggle::make('is_active')->required(),
                                Toggle::make('is_visible')->required(),
                            ]),
                    ]),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('slug'),
            TextColumn::make('name'),
            TextColumn::make('subscription_model'),
            IconColumn::make('is_active')->boolean(),
            IconColumn::make('is_visible')->boolean(),
            TextColumn::make('price'),
            TextColumn::make('features_count')->counts('features'),
        ])
            ->filters([
                Filter::make('is_active')->label(__('subscription.is_active')),
                Filter::make('is_visible')->label(__('subscription.is_visible')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlans::route('/'),
            'create' => CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }
}
