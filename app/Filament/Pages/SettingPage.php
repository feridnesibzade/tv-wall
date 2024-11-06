<?php

namespace App\Filament\Pages;

use App\Models\Setting;
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

use Filament\Notifications\Notification;

class SettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $navigationHeade = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.setting-page';

    protected static ?int $navigationSort = 999;
    public function mount(): void
    {
        $row = Setting::find(1) ?? null;
        $this->form->fill([
            'logo' => $row->logo ?? null,
            'phone' => $row->phone ?? null,
            'tax' => $row->tax ?? null,
            'email' => $row->email ?? null,
            'social_medias' => array_map(fn($item) => [
                'title' => $item['title'] ?? null,
                'link' => $item['link'] ?? null,
                'icon' => $item['icon'] ?? null
            ], $row->social_medias ?? []),
        ]);
        ;
    }

    public function form(Form $form): Form
    {
        return $form->columns(2)
            ->schema([
                TextInput::make('phone')->required(),
                TextInput::make('tax')->required(),
                TextInput::make('email')->email()->required(),
                FileUpload::make('logo')
                    ->disk('public')
                    ->directory('settings')
                    ->image()
                    ->required(),

                Repeater::make('social_medias')
                    ->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('link')->required(),
                        FileUpload::make('icon')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->required(),
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
            Setting::updateOrCreate(['id' => 1], [
                'phone' => $data['phone'],
                'logo' => $data['logo'],
                'email' => $data['email'],
                'tax' => $data['tax'],
                'social_medias' => json_encode($data['social_medias']),
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
