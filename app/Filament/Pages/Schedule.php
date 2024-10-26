<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

use App\Models\Schedule as ModelSchedule;
use Filament\Notifications\Notification;

class Schedule extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Sections';

    protected static string $view = 'filament.pages.schedule';

    public function mount(): void
    {
        $row = ModelSchedule::find(1) ?? null;
        $this->form->fill([
            'title' => $row->title ?? null,
            'description' => $row->description ?? null,
            'detail' => array_map(fn ($item) => [
                'title' => $item->title ?? null,
                'description' => $item->description ?? null,
                'image' => $item->image ?? null
            ], json_decode($row->detail ?? '') ?? []),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),

                RichEditor::make('description')
                    ->nullable()->hidden(),

                Repeater::make('detail')
                    ->schema([
                        TextInput::make('title')->required(),
                        FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->directory('Schedule')
                        ->required(),
                        RichEditor::make('description')->required()->columnSpanFull(),
                    ])
                    ->columns(2),
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
            ModelSchedule::updateOrCreate(['id' => 1], [
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'detail' => json_encode($data['detail']),
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
