<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $name, $img_src, $img_src_new, $arrival, $upcoming;

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
        $this->arrival = '0';
        $this->upcoming = '0';
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'img_src' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'arrival' => 'required',
            'upcoming' => 'required'
        ]);
        

        $imageName = time().'.'.$this->img_src->extension();
        $this->img_src->storePubliclyAs('public/cats',$imageName);

        $validatedDate = array(
                         'name' => $this->name,
                         'img_src' => $imageName,
                         'arrival' => $this->arrival,
                         'upcoming' => $this->upcoming);

        Category::create($validatedDate);

        session()->flash('message', 'Category Created Successfully.');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->img_src = '';
        $this->name = '';
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function delete()
    {
        $user = Category::find($this->user_id);
        if(file_exists('storage/cats/'.$user->img_src.''))
        {
        unlink('storage/cats/'.$user->img_src.'');
        }
        Category::find($this->user_id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $custs = Category::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $custs->name;
        $this->img_src = $custs->img_src;
        $this->arrival = $custs->arrival;
        $this->upcoming = $custs->upcoming;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'arrival' => 'required',
            'upcoming' => 'required'
        ]);

        if(empty($this->img_src_new))
        {
        if ($this->user_id) 
        {
            $user = Category::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'arrival' => $this->arrival,
                'upcoming' => $this->upcoming
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Category Updated Successfully.');
            $this->resetInputFields();
        }
        }else{
        if ($this->user_id) 
        {
            $imageName = time().'.'.$this->img_src_new->extension();
            $this->img_src_new->storePubliclyAs('public/cats',$imageName);
            $user = Category::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'img_src' => $imageName,
                'arrival' => $this->arrival,
                'upcoming' => $this->upcoming
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Category Updated Successfully.');
            $this->resetInputFields();
        }
        }
    }

    public function render()
    {
        return view('livewire.categories',[
            'users' => Category::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->Paginate(20),
            'count' => Category::count(),
        ]);
    }
}
