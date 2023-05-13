<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TacheResource\Pages;
use App\Filament\Resources\TacheResource\RelationManagers;
use App\Models\Probleme;
use App\Models\Tache;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TacheResource extends Resource
{
    protected static ?string $model = Tache::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(150),
                    Forms\Components\Select::make("user_id") 
                    ->options(User::where("rolls","=","ROLL_TECH")->pluck("name","id")) 
                    ->searchable()
                    ->required(), 
                    Forms\Components\Select::make("probleme_id") 
                    ->options(Probleme::all()->pluck("title","id")) 
                    ->searchable()
                    ->required(), 
                Forms\Components\TextInput::make('description')
                    ->maxLength(150),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('probleme_id'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTaches::route('/'),
            'create' => Pages\CreateTache::route('/create'),
            'edit' => Pages\EditTache::route('/{record}/edit'),
        ];
    }    
}
