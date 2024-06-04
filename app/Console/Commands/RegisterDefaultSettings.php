<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class RegisterDefaultSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:register-default-settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registra as configurações padrões do sistema.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Setting::create([
            'key'  => 'organization_name', 'label' => 'Nome da organização',
            'type' => 'text', 'tag' => 'general',
        ]);
        Setting::create([
            'key'  => 'banner_image', 'label' => 'Imagem do banner',
            'type' => 'image', 'tag' => 'general',
        ]);
        Setting::create([
            'key'  => 'instagram_link', 'label' => 'Link do Instagram:',
            'type' => 'text', 'tag' => 'social'
        ]);
        Setting::create([
            'key'  => 'facebook_link', 'label' => 'Link do Facebook',
            'type' => 'text', 'tag' => 'social'
        ]);
        Setting::create([
            'key' => 'pix', 'label' => 'Chave PIX', 'type' => 'text',
            'tag' => 'financial'
        ]);
        Setting::create([
            'key'  => 'recipient', 'label' => 'Nome do Beneficiário',
            'type' => 'text', 'tag' => 'financial'
        ]);
    }
}
