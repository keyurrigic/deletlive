<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BenefitResource\Pages;
use App\Filament\Resources\BenefitResource\RelationManagers;
use App\Models\Benefit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BenefitResource extends Resource
{
    protected static ?string $model = Benefit::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBenefits::route('/'),
            'create' => Pages\CreateBenefit::route('/create'),
            'edit' => Pages\EditBenefit::route('/{record}/edit'),
        ];
    }
}
