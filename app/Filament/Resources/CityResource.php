<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use App\Models\Country;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('city')
                    ->required()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))), // Updates the slug based on title,
                Select::make('country_id')
                    ->label('Country')
                    ->options(Country::all()->pluck('title', 'id'))
                    ->searchable(),

                // TextInput::make('slug')
                //     ->required()
                //     ->label('Slug')
                //     ->readOnly(true)
                //     ->unique(ignoreRecord: true),

                TextInput::make('title')->required(),
                TextInput::make('zip_code')->nullable(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('city')
                    ->required(),
                RichEditor::make('description')->required(),
                Repeater::make('detail')
                    ->schema([
                        RichEditor::make('description')->required(),
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('city'),
                TextColumn::make('title'),
                ImageColumn::make('image')->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
        // ->headerActions([

        // ]);
    }

    // Correct method to mutate form data before saving
    public static function mutateFormDataBeforeSave(array $data): array
    {
        // Ensure the 'detail' field is properly json_encoded
        $data['detail'] = json_encode($data['detail']);

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCities::route('/'),
        ];
    }
}
