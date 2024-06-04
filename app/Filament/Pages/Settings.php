<?php

namespace App\Filament\Pages;

use App\Filament\Resources\ItemResource;
use App\Filament\Resources\TestResource\Widgets\TestWidget;
use App\Livewire\Settings\AddressesTable;
use App\Livewire\Settings\SettingsTable;
use App\Livewire\Settings\SocialMedia;
use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget;
use Hamcrest\Core\Set;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Actions\CreateAction;
use Filament\Forms\Form;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 999;
    protected static ?string $navigationLabel = 'Configurações';

    protected static string $view = 'filament.pages.settings';

    protected const SETTINGS_FORMS_PATH = "App\\Livewire\\Settings\\";
    protected const SETTINGS_COMPONENT_PATH = "Settings\\";

    public string $activeTab = 'general';
    public string $currentNav = 'Settings\GeneralForm';

    public function setCurrentNav(string $nav): void
    {
        $form = ucfirst($nav).'Form';
        if (class_exists(self::SETTINGS_FORMS_PATH.$form)) {
            $this->activeTab  = $nav;
            $this->currentNav = self::SETTINGS_COMPONENT_PATH.$form;
        }
    }

    public function getTitle(): string|Htmlable
    {
        return __('Configurações');
    }

}
