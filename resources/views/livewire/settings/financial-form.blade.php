<div class="mt-3">
    <form wire:submit="save">
        {{ $this->form }}
        
        <x-filament::button
                class="mt-3"
                label="Salvar"
                type="submit"
        >
            Salvar
        </x-filament::button>
    </form>

    <x-filament-actions::modals />
</div>
