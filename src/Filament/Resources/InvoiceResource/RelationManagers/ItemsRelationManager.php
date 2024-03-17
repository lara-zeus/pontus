<?php

namespace LaraZeus\Pontus\Filament\Resources\InvoiceResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'quantity';

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('description')->maxLength(255)->required(),
            TextInput::make('quantity')->required(),
            TextInput::make('amount')->required()->helperText('price + vat'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('quantity'),
            TextColumn::make('amount'),
        ]);
    }
}
