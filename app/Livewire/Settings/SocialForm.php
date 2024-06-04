<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class SocialForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Setting $record;

    public function mount(): void
    {
        $this->form->fill([
            'facebook_link'  => (new Setting())->getSettingValue('facebook_link'),
            'instagram_link' => (new Setting())->getSettingValue('instagram_link'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
                Forms\Components\TextInput::make('facebook_link')
                                          ->label('Link do Facebook:'),
                Forms\Components\TextInput::make('instagram_link')
                                          ->label('Link do Instagram:')
            ])->statePath('data')->model(Setting::class);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach ($data as $key => $value) {
            (new Setting())->getSetting($key)->update(['value' => $value]);
        }
    }

    public function render(): View
    {
        return view('livewire.settings.social-form');
    }
}
