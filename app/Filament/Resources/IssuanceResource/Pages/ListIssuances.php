<?php

namespace App\Filament\Resources\IssuanceResource\Pages;

use App\Filament\Resources\IssuanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIssuances extends ListRecords
{
    protected static string $resource = IssuanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
