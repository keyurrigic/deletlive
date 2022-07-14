<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class OrderitemsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'orderitems';

    protected static ?string $recordTitleAttribute = 'order_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('price')->required(),
                Forms\Components\TextInput::make('qty')->required(),
                Forms\Components\TextInput::make('total')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('qty'),
                Tables\Columns\TextColumn::make('total'),
            ])
            ->filters([
                //
            ]);
    }
}
