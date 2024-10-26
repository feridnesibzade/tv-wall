<?php

namespace App\Filament\Resources\WorkTimeResource\Pages;

use App\Filament\Resources\WorkTimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWorkTimes extends ManageRecords
{
    protected static string $resource = WorkTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
