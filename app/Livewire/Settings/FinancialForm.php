<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class FinancialForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Setting $record;

    public function mount(): void
    {
        $this->form->fill([
            'recipient' => (new Setting())->getSettingValue('recipient'),
	        'pix' => (new Setting())->getSettingValue('pix'),
            'pix_qrcode' => (new Setting())->getSettingValue('pix_qrcode')
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('recipient')->label('Nome do Beneficiário'),
                Forms\Components\TextInput::make('pix')->label('Chave PIX'),
                Forms\Components\FileUpload::make('pix_qrcode')->label('QR Code do PIX')->image()->helperText(new HtmlString('Você pode gerar um QR Code do seu pix através do site <a href="https://www.gerarpix.com.br/">https://www.gerarpix.com.br/</a> ou <a href="https://geradordepix.com/">https://geradordepix.com/</a>, baixar a imagem do seu código e anexá-la aqui.'))


            ])
            ->statePath('data')
            ->model(Setting::class);
    }

    public function save(): void
    {
	    $data = $this->form->getState();
	    foreach($data as $key => $value) {
		    (new Setting())->getSetting($key)->update(['value' => $value]);
	    }
    }

    public function render(): View
    {
        return view('livewire.settings.financial-form');
    }
}
