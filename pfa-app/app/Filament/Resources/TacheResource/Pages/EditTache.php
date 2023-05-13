<?php

namespace App\Filament\Resources\TacheResource\Pages;

use App\Filament\Resources\TacheResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTache extends EditRecord
{
    protected static string $resource = TacheResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
