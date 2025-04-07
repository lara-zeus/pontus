<?php

namespace LaraZeus\Pontus\Filament\Resources;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use LaraZeus\Chaos\Filament\ChaosResource\ChaosForms;
use LaraZeus\Chaos\Filament\ChaosResource\ChaosTables;
use LaraZeus\Chaos\Forms\Components\MultiLang;
use LaraZeus\Pontus\Filament\Resources\PlanResource\Pages;
use LaraZeus\Pontus\Filament\Resources\PlanResource\Pages\CreatePlan;
use LaraZeus\Pontus\Models\Intervals;

class PlanResource extends PontusResource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $langFile = 'zeus-pontus::plan.';

    public static function getModel(): string
    {
        return config('rinvex.subscriptions.models.plan');
    }

    public static function getModelLabel(): string
    {
        return __(static::$langFile . 'singleTitle');
    }

    public static function getPluralModelLabel(): string
    {
        return __(static::$langFile . 'title');
    }

    public static function form(Schema $schema): Schema
    {
        return ChaosForms::make(
            $schema,
            [
                Section::make('nameAndDesc')
                    ->heading(__(static::$langFile . 'nameAndDesc'))
                    ->columns()
                    ->schema([
                        MultiLang::make('name')
                            ->label(__(static::$langFile . 'name')),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->label(__(static::$langFile . 'slug'))
                            ->required(),
                        RichEditor::make('description')
                            ->label(__(static::$langFile . 'description'))
                            ->columnSpanFull(),
                    ]),

                Repeater::make('plan_feature')
                    ->label(__(static::$langFile . 'plan_features'))
                    ->relationship('features')
                    ->columnSpanFull()
                    ->collapsible()
                    ->reorderable()
                    ->schema([
                        Grid::make()
                            ->schema([
                                MultiLang::make('name')
                                    ->label(__(static::$langFile . 'name')),
                                Select::make('slug')
                                    ->label(__(static::$langFile . 'plan_feature.slug'))
                                    ->options(config('zeus-pontus.models.Features')::pluck('label', 'code')),
                            ]),

                        RichEditor::make('description')
                            ->label(__(static::$langFile . 'description'))
                            ->required()
                            ->hint(__(static::$langFile . 'features_description_hint')),

                        Grid::make()
                            ->schema([
                                TextInput::make('value')
                                    ->required()
                                    ->label(__(static::$langFile . 'plan_feature.value'))
                                    ->hint(__(static::$langFile . 'plan_feature.for_static_plans')),
                                TextInput::make('price')
                                    ->label(__(static::$langFile . 'price'))
                                    ->hint(__(static::$langFile . 'plan_feature.price_hint'))
                                    ->default(0)
                                    ->required(),
                                TextInput::make('sort_order')
                                    ->label(__(static::$langFile . 'sort_order'))
                                    ->required(),
                            ]),

                        Grid::make()->schema([
                            TextInput::make('resettable_period')
                                ->label(__(static::$langFile . 'plan_feature.resettable_period'))
                                ->required(),
                            Select::make('resettable_interval')
                                ->default('month')
                                ->label(__(static::$langFile . 'plan_feature.resettable_interval'))
                                ->options(Intervals::pluck('label', 'name')),
                        ]),
                    ]),
            ],
            [
                Section::make()
                    ->columns()
                    ->compact()
                    ->schema([
                        TextInput::make('price')
                            ->label(__(static::$langFile . 'price'))
                            ->required()
                            ->default(0),
                        TextInput::make('signup_fee')
                            ->label(__(static::$langFile . 'signup_fee'))
                            ->required()
                            ->default(0),
                        Select::make('subscription_model')
                            ->label(__(static::$langFile . 'subscription_model'))
                            ->columnSpanFull()
                            ->default('PAYG')
                            ->options([
                                'PAYG' => __(static::$langFile . 'PAYG'),
                                'FIXED' => __(static::$langFile . 'FIXED'),
                            ]),
                    ]),

                Section::make()
                    ->compact()
                    ->heading(__(static::$langFile . 'plans_invoice'))
                    ->schema([
                        TextInput::make('invoice_period')
                            ->label(__(static::$langFile . 'invoice_period'))
                            ->required()
                            ->integer()
                            ->default(1),
                        Select::make('invoice_interval')
                            ->label(__(static::$langFile . 'invoice_interval'))
                            ->options(Intervals::pluck(
                                'label',
                                'name'
                            ))
                            ->default('month'),
                    ]),

                Section::make()
                    ->heading(__(static::$langFile . 'plans_trials'))
                    ->compact()
                    ->schema([
                        TextInput::make('trial_period')
                            ->label(__(static::$langFile . 'trial_period'))
                            ->required()
                            ->integer()
                            ->default(15),
                        Select::make('trial_interval')
                            ->label(__(static::$langFile . 'trial_interval'))
                            ->options(Intervals::pluck('label', 'name'))
                            ->default('day'),
                    ]),

                Section::make()
                    ->compact()
                    ->heading(__(static::$langFile . 'plans_grace'))
                    ->schema([
                        TextInput::make('grace_period')
                            ->label(__(static::$langFile . 'grace_period'))
                            ->required()
                            ->integer()
                            ->default(15),
                        Select::make('grace_interval')
                            ->label(__(static::$langFile . 'grace_interval'))
                            ->options(Intervals::pluck('label', 'name'))
                            ->default('day'),
                    ]),

                Section::make()
                    ->compact()
                    ->heading(__(static::$langFile . 'plans_options'))
                    ->schema([
                        TextInput::make('sort_order')
                            ->label(__(static::$langFile . 'sort_order'))
                            ->required()
                            ->default(1)
                            ->integer(),
                        TextInput::make('currency')
                            ->label(__(static::$langFile . 'currency'))
                            ->default('SAR')
                            ->maxLength(3),
                        TextInput::make('active_subscribers_limit')
                            ->label(__(static::$langFile . 'active_subscribers_limit'))
                            ->integer(),
                        Toggle::make('is_active')
                            ->label(__(static::$langFile . 'is_active'))
                            ->required(),
                        Toggle::make('is_visible')
                            ->label(__(static::$langFile . 'is_visible'))
                            ->required(),
                    ]),
            ]
        )
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return ChaosTables::make(
            resource: static::class,
            table: $table,
            columns: [
                TextColumn::make('slug')
                    ->label(__(static::$langFile . 'slug')),
                TextColumn::make('name')
                    ->label(__(static::$langFile . 'name')),
                TextColumn::make('subscription_model')
                    ->label(__(static::$langFile . 'subscription_model')),
                IconColumn::make('is_active')
                    ->label(__(static::$langFile . 'is_active'))
                    ->boolean(),
                IconColumn::make('is_visible')
                    ->label(__(static::$langFile . 'is_visible'))
                    ->boolean(),
                TextColumn::make('price')
                    ->label(__(static::$langFile . 'price')),
                TextColumn::make('features_count')
                    ->label(__(static::$langFile . 'features_count'))
                    ->counts('features'),
            ],
            filters: [
                Filter::make('is_active')->label(__('subscription.is_active')),
                Filter::make('is_visible')->label(__('subscription.is_visible')),
            ]
        );
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
