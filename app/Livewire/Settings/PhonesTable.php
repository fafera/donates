<?php

namespace App\Livewire\Settings;

use App\Models\Phone;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

class PhonesTable extends Component implements HasForms, HasTable {
	use InteractsWithForms;
	use InteractsWithTable;

	public function table( Table $table ): Table {
		return $table->query( Phone::query() )->columns($this->getTableColumns())->filters( [//
			] )->headerActions( [
				Tables\Actions\CreateAction::make()
				                           ->form( $this->getFormSchema() )
			] )->actions( [
				Tables\Actions\EditAction::make()
				                         ->form( $this->getFormSchema() )
			] )->bulkActions( [
				Tables\Actions\BulkActionGroup::make( [//
				] ),
			] );
	}

	public function render(): View {
		return view( 'livewire.settings.phones-table' );
	}

	protected function getFormSchema(): array {
		return [
			TextInput::make( 'label' )->required(),
			TextInput::make( 'number' )->type( 'number' )->required(),
			Select::make( 'addresses' )->relationship( 'addresses', 'street' )->preload()
			      ->multiple()
		];
	}

	protected function getTableColumns(): array {
		return [
			Tables\Columns\TextColumn::make( 'number' )->searchable(),
			Tables\Columns\TextColumn::make( 'label' )->searchable(),
		];
	}
}
