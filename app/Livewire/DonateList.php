<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DonateList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $order = 'status';
    public $orderSelect;
    public string $orderDirection = 'DESC';
    public ?array $data;
    public Collection $addresses;
    public function mount($args = null) {
        if(!is_null($args)) $this->data = $args;

        $this->addresses = Address::all();
    }
    public function render()
    {
        $items = Item::when($this->search !== '',
            fn(Builder $query) => $query->where('title', 'like',
                '%'.$this->search.'%'))->orderBy($this->order, $this->orderDirection)
                     ->paginate(10);

        return view('donate-list.index', ['items' => $items]);
    }

    public function updatedOrderSelect($value) {
        if(!str_contains($value, '-')) {
            return;
        }
        $orderValue = explode('-',$value);
        $this->order = $orderValue[0];
        $this->orderDirection = $orderValue[1];
    }


}
