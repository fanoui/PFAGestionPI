<?php

namespace App\Filament\Resources\MaterialeResource\Pages;

use App\Filament\Resources\MaterialeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMateriale extends CreateRecord
{
    protected static string $resource = MaterialeResource::class;
   
}
