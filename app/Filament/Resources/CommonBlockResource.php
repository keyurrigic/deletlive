<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommonBlockResource\Pages;
use App\Filament\Resources\CommonBlockResource\RelationManagers;
use App\Models\CommonBlock;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CommonBlockResource extends Resource
{
    protected static ?string $model = CommonBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\RichEditor::make('content')->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommonBlocks::route('/'),
            'create' => Pages\CreateCommonBlock::route('/create'),
            'edit' => Pages\EditCommonBlock::route('/{record}/edit'),
        ];
    }
}
