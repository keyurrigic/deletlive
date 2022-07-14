<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class RepliesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'replies';

    protected static ?string $recordTitleAttribute = 'Reply';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('comment')->required(),
                Forms\Components\Repeater::make('images')
                ->schema([
                    Forms\Components\FileUpload::make('image')->disk('public')->directory('support')->image()->preserveFilenames()->imagePreviewHeight('100')
                ])->createItemButtonLabel('Add Image')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('comment')->view('filament.tables.columns.reply'),
                Tables\Columns\TextColumn::make('created_at')->sortable(),
            ])
            ->filters([
                //
            ]);
    }
}
