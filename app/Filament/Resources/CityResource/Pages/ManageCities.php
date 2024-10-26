<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use App\Models\City;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCities extends ManageRecords
{
    protected static string $resource = CityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['detail'] = json_encode($data['detail']);
                $data['slug'] = \Str::slug($data['title']);
                // $data['slug'] = \Str::slug($data['title']);
                return $data;
            }),
        ];
    }


}
