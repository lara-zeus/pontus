<?php

namespace LaraZeus\Pontus\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use LaraZeus\Pontus\Filament\Resources\InvoiceResource\Pages;
use LaraZeus\Pontus\Filament\Resources\InvoiceResource\RelationManagers;
use LaraZeus\Pontus\Models\Invoices\Invoice;

class InvoiceResource extends PontusResource
{
    protected static ?string $model = Invoice::class;

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->schema([
                    Select::make('customer_id')
                        ->relationship('customer', 'customer_surname')
                       // ->options(User::pluck('name', 'id'))
                        ->required()
                        ->searchable(),
                    TextInput::make('item_id'),
                    TextInput::make('amount')->required(),
                    TextInput::make('tax')->required(),
                    TextInput::make('discount_type')->maxLength(255),
                    TextInput::make('discount_value'),
                    DateTimePicker::make('due_date')->required(),
                    DateTimePicker::make('exp_date')->required(),
                    Toggle::make('paid')->required(),
                    Toggle::make('allow_partial_paid')->required(),
                    TextInput::make('note')->maxLength(255),
                ])
                ->columns(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('subscription.plan.name'),
            TextColumn::make('amount'),
            TextColumn::make('tax'),
            TextColumn::make('discount_type'),
            TextColumn::make('discount_value'),
            TextColumn::make('due_date')->dateTime(),
            TextColumn::make('exp_date')->dateTime(),
            IconColumn::make('paid')->boolean(),
            TextColumn::make('note'),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
            RelationManagers\TransactionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('zeus-pontus::invoice.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('zeus-pontus::invoice.plural_model_label');
    }
}
