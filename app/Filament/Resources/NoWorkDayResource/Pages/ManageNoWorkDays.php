<?php

namespace App\Filament\Resources\NoWorkDayResource\Pages;

use App\Filament\Resources\NoWorkDayResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNoWorkDays extends ManageRecords
{
    protected static string $resource = NoWorkDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
