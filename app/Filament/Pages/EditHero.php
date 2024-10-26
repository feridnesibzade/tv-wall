<?php

namespace App\Filament\Pages;

use App\Models\Hero;
use Filament\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditHero extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Sections';

    protected static string $view = 'filament.pages.edit-hero';

    public function mount(): void
    {
        $row = Hero::first();
        $this->form->fill([
            'title' => $row->title ?? null,
            'description' => $row->description ?? null,
            'background_image' => $row->background_image ?? null,
            'button_title' => $row->button_title ?? null,
            'button_link' => $row->button_link ?? null,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                TextInput::make('title')
                    ->required(),

                RichEditor::make('description')
                    ->required(),
                FileUpload::make('background_image')->image()
                    ->disk('public')
                    ->directory('sections')
                    // ->visibility('public')
                    ->required(),

                Fieldset::make('Button')->schema([
                    TextInput::make('button_title')->required(),
                    TextInput::make('button_link')->required(),
                ]),

            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            Hero::updateOrCreate(
                [
                    'id' => 1,
                ], [
                    'id' => 1,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'background_image' => $data['background_image'],
                    'button_title' => $data['button_title'],
                    'button_link' => $data['button_link'],
                ]);
                Notification::make()
                ->success()
                ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
                ->send();
        } catch (Halt $exception) {
            return;
        }
    }
}
