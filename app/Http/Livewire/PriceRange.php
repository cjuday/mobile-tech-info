<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PriceRanges;

class PriceRange extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'value';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $value, $lower, $upper;

    public function sortBy($field)
    {
        if($this->sortField === $field) 
        {
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function create_initiate()
    {
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
    }

    private function resetInputFields()
    {
        $this->value = '';
        $this->upper = '';
        $this->lower = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'value' => 'required',
            'lower' => 'required'
        ]);

        PriceRanges::create($validatedDate);

        session()->flash('message', 'Price Range Added Successfully.');

        $this->resetInputFields();
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function delete()
    {
        PriceRanges::find($this->user_id)->delete();
        session()->flash('message', 'Price Range Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $custs = PriceRanges::where('id',$id)->first();
        $this->user_id = $id;
        $this->value = $custs->value;
        $this->lower = $custs->lower;
        $this->upper = $custs->upper;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'value' => 'required',
            'lower' => 'required'
        ]);

        if($this->upper=="")
        {
            $this->upper = NULL;
        }

        if ($this->user_id) 
        {
            $user = PriceRanges::find($this->user_id);
            $user->update([
                'value' => $this->value,
                'lower' => $this->lower,
                'upper' => $this->upper,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Price Range Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function render()
    {
        return view('livewire.price-range',[
            'users' => PriceRanges::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->Paginate(20),
            'count' => PriceRanges::count(),
        ]);
    }
}
