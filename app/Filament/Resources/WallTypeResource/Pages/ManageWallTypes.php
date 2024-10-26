<?php

namespace App\Filament\Resources\WallTypeResource\Pages;

use App\Filament\Resources\WallTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWallTypes extends ManageRecords
{
    protected static string $resource = WallTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
