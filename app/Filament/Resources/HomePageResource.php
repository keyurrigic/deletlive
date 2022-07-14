<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Filament\Resources\HomePageResource\RelationManagers;
use App\Models\HomePage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\MarkdownEditor::make('bannertext')->required(),
                Forms\Components\TextInput::make('videotitle')->required(),
                Forms\Components\TextInput::make('videourl')->required(),
                Forms\Components\TextInput::make('title1text')->required(),
                Forms\Components\TextInput::make('benefittitle')->required(),
                Forms\Components\TextInput::make('flowtitle')->required(),
                Forms\Components\MarkdownEditor::make('flowcontent')->required(),
                Forms\Components\TextInput::make('featuredpacktitle')->required(),
                Forms\Components\TextInput::make('testimonialstitle')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }
}
