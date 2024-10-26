<?php

namespace App\Filament\Pages;

use App\Models\About;
use Filament\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class AboutUsPage extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Pages';

    protected static string $view = 'filament.pages.about-us-page';

    public function mount(): void
    {
        $row = About::first();
        $this->form->fill([
            'title' => $row->title ?? null,
            'description' => $row->description ?? null,
            'logo' => $row->logo ?? null,
            'statistics' =>  array_map(fn ($item) => ['title' => $item->title, 'count' => $item->count], json_decode($row->statistics ?? '') ?? []) ?? null,
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
                FileUpload::make('logo')->image()
                    ->disk('public')
                    ->directory('sections')
                    ->required(),

                Repeater::make('statistics')->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('count')->required(),
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

            About::updateOrCreate(
                [
                    'id' => 1,
                ], [
                    'id' => 1,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'logo' => $data['logo'],
                    'statistics' => json_encode($data['statistics']),
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
