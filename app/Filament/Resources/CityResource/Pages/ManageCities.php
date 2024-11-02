<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use App\Models\City;
use App\Models\ZipCode;
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

                // dd($data['zip_code']);
    
                // $data['slug'] = \Str::slug($data['title']);
                return $data;
            })->after(function (City $city, array $data) {
                $city->zipCodes()->delete();
                $zipCodes = array_map(fn($item) => new ZipCode(['zip_code' => $item['zip_code']]), $data['zipCodes']);
                $city->zipCodes()->saveMany($zipCodes);

                return $city;
            }),
        ];

    }


}
