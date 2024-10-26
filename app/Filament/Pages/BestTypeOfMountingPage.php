<?php

namespace App\Filament\Pages;

use App\Models\BestTypeOfMount;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class BestTypeOfMountingPage extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Sections';

    protected static string $view = 'filament.pages.best-type-of-mounting-page';

    public function mount(): void
    {
        $row = BestTypeOfMount::find(1);
        $detailObj = json_decode($row->detail ?? '') ?? [];
        $detailArr = array_map(fn ($item) => ['title' => $item->title, 'image' => $item->image], $detailObj);
        $this->form->fill([
            'title' => $row->title ?? null,
            'description' => $row->description ?? null,
            'detail' => $detailArr,
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

                Repeater::make('detail')->label('Sizes')
                    ->schema([
                        TextInput::make('title')->required(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('bestTypeOfMounting')
                            ->required(),
                        RichEditor::make('description')
                            ->required()->columnSpanFull(),
                    ])
                    ->columnSpanFull()->columns(2),

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

            BestTypeOfMount::updateOrCreate(
                [
                    'id' => 1,
                ], [
                    'id' => 1,
                    'title' => $data['title'],
                    'description' => $data['description'],
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
