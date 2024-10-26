<?php

namespace App\Filament\Resources\TvSizeResource\Pages;

use App\Filament\Resources\TvSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTvSizes extends ManageRecords
{
    protected static string $resource = TvSizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
