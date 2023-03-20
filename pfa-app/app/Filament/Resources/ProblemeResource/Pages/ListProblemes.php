<?php

namespace App\Filament\Resources\ProblemeResource\Pages;

use App\Filament\Resources\ProblemeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProblemes extends ListRecords
{
    protected static string $resource = ProblemeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
