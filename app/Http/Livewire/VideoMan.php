<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Videos;

class VideoMan extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $link;

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
        $this->link = '';
    }

    public function store()
    {
        $this->validate([
            'link' => 'required'
        ]);

        
        $lnk = explode('v=',$this->link);

        if(strpos($lnk[1],'&'))
        {
            $lnk_last = explode('&',$lnk[1]);
            $final_lnk = $lnk_last[0];
        }else{
            $final_lnk = $lnk[1];
        }

        $validatedDate = array(
            'link' => $this->link,
            'video_id' => $final_lnk
        );

        Videos::create($validatedDate);

        session()->flash('message', 'Video Added Successfully.');

        $this->resetInputFields();
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function delete()
    {
        Videos::find($this->user_id)->delete();
        session()->flash('message', 'Video Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $custs = Videos::where('id',$id)->first();
        $this->user_id = $id;
        $this->link = $custs->link;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'link' => 'required'
        ]);

        $lnk = explode('v=',$this->link);

        if(strpos($lnk[1],'&'))
        {
            $lnk_last = explode('&',$lnk[1]);
            $final_lnk = $lnk_last[0];
        }else{
            $final_lnk = $lnk[1];
        }

        if ($this->user_id) 
        {
            $user = Videos::find($this->user_id);
            $user->update([
                'link' => $this->link,
                'video_id' => $final_lnk
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Video Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function render()
    {
        return view('livewire.video-man',[
            'users' => Videos::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->Paginate(20),
            'count' => Videos::count(),
        ]);
    }
}
