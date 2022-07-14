<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('headerlogo')->disk('public')->directory('setting')->image()->preserveFilenames()->imagePreviewHeight('100')->required(),
                Forms\Components\FileUpload::make('footerlogo')->disk('public')->directory('setting')->image()->preserveFilenames()->imagePreviewHeight('100')->required(),
                Forms\Components\TextInput::make('footercontent')->required(),
                Forms\Components\TextInput::make('trytitle')->required(),
                Forms\Components\TextInput::make('trydescription')->required(),
                Forms\Components\TextInput::make('trybuttontext')->required(),
                Forms\Components\TextInput::make('trybuttonlink')->required(),
                Forms\Components\TextInput::make('howitworktitle')->required(),
                Forms\Components\RichEditor::make('howitworkcontent')->required() 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
