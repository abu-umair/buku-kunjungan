<?php

namespace App\Filament\Resources\Tata_usahaResource\Pages;

use App\Filament\Resources\Tata_usahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTata_usahas extends ListRecords
{
    protected static string $resource = Tata_usahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
