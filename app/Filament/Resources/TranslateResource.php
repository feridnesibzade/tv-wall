<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TranslateResource\Pages;
use App\Filament\Resources\TranslateResource\RelationManagers;
use App\Models\Translate;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TranslateResource extends Resource
{
    protected static ?string $model = Translate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Static texts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('text'),
                TextInput::make('key'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('text'),
                TextColumn::make('key'),
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
            ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTranslates::route('/'),
        ];
    }
}
