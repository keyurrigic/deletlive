<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\Country;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\Fieldset::make('Shipping')
                    ->relationship('shipping')
                    ->schema([
                        Forms\Components\TextInput::make('fullname')->required(),
                        Forms\Components\TextInput::make('phonenumber')->required(),
                        Forms\Components\TextInput::make('address1')->required(),
                        Forms\Components\TextInput::make('address2')->required(),
                        Forms\Components\select::make('country_id')->options(Country::all()->pluck('name', 'id'))->required(),
                        Forms\Components\TextInput::make('state')->required(),
                        Forms\Components\TextInput::make('city')->required(),
                        Forms\Components\TextInput::make('postalcode')->required(),
                    ]),
                Forms\Components\Fieldset::make('Billing')
                ->relationship('billing')
                ->schema([
                    Forms\Components\TextInput::make('fullname')->required(),
                    Forms\Components\TextInput::make('phonenumber')->required(),
                    Forms\Components\TextInput::make('address1')->required(),
                    Forms\Components\TextInput::make('address2')->required(),
                    Forms\Components\select::make('country_id')->options(Country::all()->pluck('name', 'id'))->required(),
                    Forms\Components\TextInput::make('state')->required(),
                    Forms\Components\TextInput::make('city')->required(),
                    Forms\Components\TextInput::make('postalcode')->required(),
                ])
                //billing_addresses
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('email')
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
