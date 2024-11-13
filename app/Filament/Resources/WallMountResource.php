<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WallMountResource\Pages;
use App\Models\TvSize;
use App\Models\WallMount;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WallMountResource extends Resource
{
    protected static ?string $model = WallMount::class;

    protected static ?string $navigationGroup = 'Products';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                // TextInput::make('price')->required(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('wall-type'),
                Section::make('prices')->schema(function ($record) {
                    $components = [];

                    foreach (TvSize::all() as $size) {
                        $components[] = TextInput::make("prices.{$size->id}")->label($size->title . ' Price');
                    }
                    return $components;
                })->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('prices'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->using(function ($record, array $data) {
                        $record->update($data);
                        return $record;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWallMounts::route('/'),
        ];
    }
}
