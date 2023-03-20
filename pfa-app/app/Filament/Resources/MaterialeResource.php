<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialeResource\RelationManagers\UserRelationManager;
use App\Filament\Resources\MaterialeResource\Pages;

use App\Models\Materiale;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Actions;
class MaterialeResource extends Resource
{
    protected static ?string $model = Materiale::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
  
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
          
                TextInput::make("libelle"),
                Select::make("type") ->options(["pc","tel","tablette"]) ->searchable(),
                Select::make("user_id") ->options(User::where("id","<>",auth()->id())->pluck("name","id")) ->searchable()
                //
            ]);
    }

    protected function getActions(): array
    {
    return [
     
            Actions\DeleteAction::make(),
        
    ];
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("libelle") ->sortable(),
                TextColumn::make("type") ->sortable(),
               TextColumn::make("user.name") ->sortable()
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            UserRelationManager::class
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMateriales::route('/'),
            'create' => Pages\CreateMateriale::route('/create'),
            'edit' => Pages\EditMateriale::route('/{record}/edit'),
        ];
    }    
}
