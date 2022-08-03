<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithFileUploads;

class Brands extends Component
{
        use WithFileUploads;
        use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $show = 0;
    public $updateMode = false;
    public $custs, $name, $cat, $cat_old, $img_srcx, $img_src_new;

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
        $cats = Category::all();
    }

    public function cancel()
    {
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'cat' => 'required',
            'img_srcx' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif'
        ]);
        

        $imageName = time().'.'.$this->img_srcx->extension();
        $this->img_srcx->storePubliclyAs('public/brands',$imageName);

        $validatedDate = array(
                         'name' => $this->name,
                         'cat_id' => $this->cat,
                         'img' => $imageName);

        Brand::create($validatedDate);

        session()->flash('message', 'Brand Created Successfully.');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->img_srcx = '';
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function delete()
    {
        $user = Brand::find($this->user_id);
        if(file_exists('storage/brands/'.$user->img.''))
        {
        unlink('storage/brands/'.$user->img.'');
        }
        Brand::find($this->user_id)->delete();
        session()->flash('message', 'Brand Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $custs = Brand::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $custs->name;
        $this->cat_old = $custs->cat_id;
        $this->img_srcx = $custs->img;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required'
        ]);

        if(empty($this->img_src_new))
        {
        if ($this->user_id) 
        {
            $user = Brand::find($this->user_id);
            if(empty($this->cat))
            {
                $user->update([
                    'name' => $this->name,
                ]);
            }else{
                $user->update([
                    'name' => $this->name,
                    'cat_id'=> $this->cat
                ]);
            }
            $this->updateMode = false;
            session()->flash('message', 'Category Updated Successfully.');
            $this->resetInputFields();
        }
        }else{
        if ($this->user_id) 
        {
            $imageName = time().'.'.$this->img_src_new->extension();
            $this->img_src_new->storePubliclyAs('public/brands',$imageName);
            $user = Brand::find($this->user_id);
            unlink('storage/brands/'.$user->img.'');
            if(empty($this->cat))
            {
                $user->update([
                    'name' => $this->name,
                    'img' => $imageName,
                    'cat_id' => $user->cat_id

                ]);
            }else{
                $user->update([
                    'name' => $this->name,
                    'img' => $imageName,
                    'cat_id'=> $this->cat
                ]);
            }
            $this->updateMode = false;
            session()->flash('message', 'Brand Updated Successfully.');
            $this->resetInputFields();
        }
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->show == '0')
        {
         $users = Brand::search($this->search)
         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
         ->Paginate(20);
        }else{
            $users = Brand::search($this->search)
            ->where('cat_id',$this->show)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->Paginate(20);
        }

        return view('livewire.brands',[
            'users' => $users,
            'count' => Brand::count(),
            'cats' => Category::all()
        ]);
    }
}
