<x-filament-panels::page>
	
	<x-filament::section>
		<x-slot name="heading">
			Configurações Gerais
		</x-slot>
		<x-filament::tabs label="Configurações Gerais">
			<x-filament::tabs.item wire:click="setCurrentNav('general')" :active="$activeTab === 'general'">
				Gerais
			</x-filament::tabs.item>
			<x-filament::tabs.item wire:click="setCurrentNav('visual')" :active="$activeTab === 'visual'">
				Visual
			</x-filament::tabs.item>
			<x-filament::tabs.item wire:click="setCurrentNav('financial')" :active="$activeTab === 'financial'">
				Financeiro
			</x-filament::tabs.item>
			<x-filament::tabs.item wire:click="setCurrentNav('social')" :active="$activeTab === 'social'">
				Redes Sociais
			</x-filament::tabs.item>
		</x-filament::tabs>
		@livewire($currentNav, key($currentNav))
	</x-filament::section>
	<x-filament::section>
		<x-slot name="heading">
			Endereços
		</x-slot>
		@livewire('Settings\AddressesTable')
	</x-filament::section>
	<x-filament::section>
		<x-slot name="heading">
			Telefones
		</x-slot>
		@livewire('Settings\PhonesTable')
	</x-filament::section>
</x-filament-panels::page>
