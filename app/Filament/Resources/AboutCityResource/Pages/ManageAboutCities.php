<?php

namespace App\Filament\Resources\AboutCityResource\Pages;

use App\Filament\Resources\AboutCityResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAboutCities extends ManageRecords
{
    protected static string $resource = AboutCityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
