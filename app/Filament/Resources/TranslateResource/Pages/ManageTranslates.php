<?php

namespace App\Filament\Resources\TranslateResource\Pages;

use App\Filament\Resources\TranslateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTranslates extends ManageRecords
{
    protected static string $resource = TranslateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
