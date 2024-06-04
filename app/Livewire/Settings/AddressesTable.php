<?php

namespace App\Livewire\Settings;

use App\Filament\Resources\AddressResource;
use App\Models\Address;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class AddressesTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table->query(Address::query())
                     ->columns($this->getTableColumns())->filters([//
        ])->headerActions([
            Tables\Actions\CreateAction::make()->form($this->getFormSchema())
        ])->actions([
            Tables\Actions\EditAction::make()->form($this->getFormSchema()),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public function render(): View
    {
        return view('livewire.settings.addresses-table');
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('label')->label('Título do endereço')->required(),
            TextInput::make('street')->required(),
            TextInput::make('number')->type('number')->required(),
            TextInput::make('complement'),
            TextInput::make('neighborhood')->required(),
            TextInput::make('city')->required(),
            TextInput::make('uf')->required(),
            TextInput::make('cep')->required(),
            Select::make('phones')->relationship('phones', 'number')->multiple()
                  ->preload()
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('street')->searchable(),
            Tables\Columns\TextColumn::make('number')->numeric()->sortable(),
            Tables\Columns\TextColumn::make('complement')->searchable(),
            Tables\Columns\TextColumn::make('neighborhood')->searchable(),
            Tables\Columns\TextColumn::make('city')->searchable(),
            Tables\Columns\TextColumn::make('uf')->searchable(),
            Tables\Columns\TextColumn::make('cep')->searchable(),
        ];
    }
}
