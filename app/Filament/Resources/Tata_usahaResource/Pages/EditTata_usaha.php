<?php

namespace App\Filament\Resources\Tata_usahaResource\Pages;

use App\Filament\Resources\Tata_usahaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTata_usaha extends EditRecord
{
    protected static string $resource = Tata_usahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
