<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('city.title'),
                TextColumn::make('zip_code'),
                TextColumn::make('tvSize.title'),
                TextColumn::make('wallMount.title'),
                TextColumn::make('wallType.title'),
                TextColumn::make('extraServices')->formatStateUsing(function ($record) {
                    // Fetch related role titles and join them into a string
                    return $record->extraServices->pluck('title')->join(', ');
                }),
                TextColumn::make('lift_assistance_title'),
                TextColumn::make('date'),
                TextColumn::make('time')
                    ->state(static function (HasTable $livewire, $record): string {
                        return implode(', ', json_decode($record->time));
                    }),

                TextColumn::make('address'),
                // TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBooks::route('/'),
        ];
    }
}
