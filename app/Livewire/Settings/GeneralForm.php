<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class GeneralForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Setting $record;

    public function mount(): void
    {
        $this->form->fill([
                'organization_name' => (new Setting())->getSettingValue('organization_name'),
                'banner_image'      => (new Setting())->getSettingValue('banner_image'),
            ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
                Forms\Components\TextInput::make('organization_name'),
                Forms\Components\FileUpload::make('banner_image')->image()
                                           ->preserveFilenames()->disk('public')
            ])->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        foreach ($data as $key => $value) {
            (new Setting())->getSetting($key)->update(['value' => $value]);
        }
        Notification::make()->title('Configurações salvas com sucesso!')
                    ->success()->send();
    }

    public function render(): View
    {
        return view('livewire.settings.general-form');
    }
}
