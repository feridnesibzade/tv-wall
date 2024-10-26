<?php

namespace App\Filament\Resources\WallMountResource\Pages;

use App\Filament\Resources\WallMountResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWallMounts extends ManageRecords
{
    protected static string $resource = WallMountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
