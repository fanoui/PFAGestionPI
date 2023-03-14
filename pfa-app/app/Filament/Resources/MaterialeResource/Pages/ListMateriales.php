<?php

namespace App\Filament\Resources\MaterialeResource\Pages;

use App\Filament\Resources\MaterialeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMateriales extends ListRecords
{
    protected static string $resource = MaterialeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
