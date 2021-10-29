<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;
use Livewire\WithFileUploads;

class NewsMan extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $title, $meta_title, $meta_des, $meta_key, $img_src, $descrp, $descrps, $img_src_new;

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

    public function store()
    {
        $times = date('F d ,Y');
        $this->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'meta_des' => 'required',
            'meta_key' => 'required',
            'img_src' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif',
            'descrp' => 'required'
        ]);

        $imageName = time().'.'.$this->img_src->extension();
        $this->img_src->storePubliclyAs('public/news',$imageName);

        $validatedDate = array(
                         'title' => $this->title,
                         'description' => $this->descrp,
                         'meta_title' => $this->meta_title,
                         'meta_des' => $this->meta_des,
                         'meta_key' => $this->meta_key,
                         'post_date'=> $times,
                         'preview_img' => $imageName);

        News::create($validatedDate);

        session()->flash('message', 'News Created Successfully.');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->descrp = '';
        $this->meta_title = '';
        $this->meta_des = '';
        $this->meta_key = '';
        $this->img_src = '';
        $times = '';
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function delete()
    {
        $user = News::find($this->user_id);
        if(file_exists('storage/news/'.$user->preview_img.''))
        {
        unlink('storage/news/'.$user->preview_img.'');
        }
        News::find($this->user_id)->delete();
        session()->flash('message', 'News Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $custs = News::where('id',$id)->first();
        $this->user_id = $id;
        $this->title = $custs->title;
        $this->descrp = $custs->description;
        $this->meta_title = $custs->meta_title;
        $this->meta_des = $custs->meta_des;
        $this->meta_key = $custs->meta_key;
        $this->img_src = $custs->preview_img;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'meta_des' => 'required',
            'meta_key' => 'required',
            'descrp' => 'required'
        ]);

        if(empty($this->img_src_new))
        {
        if ($this->user_id) 
        {
            $user = News::find($this->user_id);
            $user->update([
            'title' => $this->title,
            'description' => $this->descrp,
            'meta_title' => $this->meta_title,
            'meta_des' => $this->meta_des,
            'meta_key' => $this->meta_key
            ]);
            $this->updateMode = false;
            session()->flash('message', 'News Updated Successfully.');
            $this->resetInputFields();
        }
        }else{
        if ($this->user_id) 
        {
            $imageName = time().'.'.$this->img_src_new->extension();
            $this->img_src_new->storePubliclyAs('public/news',$imageName);
            $user = News::find($this->user_id);
            $user->update([
                'title' => $this->title,
                'description' => $this->descrp,
                'meta_title' => $this->meta_title,
                'meta_des' => $this->meta_des,
                'meta_key' => $this->meta_key,
                'preview_img' => $imageName
            ]);
            $this->updateMode = false;
            session()->flash('message', 'News Updated Successfully.');
            $this->resetInputFields();
        }
        }
    }

    public function render()
    {
         $users = News::search($this->search)
         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
         ->Paginate(20);

        return view('livewire.news-man',[
            'users' => $users,
            'count' => News::count()
        ]);
    }
}
