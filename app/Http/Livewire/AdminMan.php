<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin;
use Hash;
class AdminMan extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $name, $email, $pass, $pass2, $user_id;

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
        $dt = array(
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>Hash::make($this->pass)
            );
            
            Admin::create($dt);
            session()->flash('message','Admin Added Successfully.');
            $this->resetInputField();
    }
    
    public function resetInputField()
    {
        $this->name="";
        $this->email="";
        $this->pass="";
        $this->pass2="";
    }
    
    public function edit($id)
    {
        $this->user_id = $id;
        $custs = Admin::where('id',$id)->first();
        $this->name=$custs->name;
        $this->email=$custs->email;
    }
    
    public function update()
    {
        if(empty($this->pass))
        {
            Admin::where('id',$this->user_id)->update([
            'name'=>$this->name,
            'email'=>$this->email
            ]);
            session()->flash('message','Admin Details Updated Successfully.');
        }else{
            if($this->pass == $this->pass2)
            {
                Admin::where('id',$this->user_id)->update([
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'password'=>Hash::make($this->pass)
                ]);
            session()->flash('message','Admin Details Updated Successfully.');
            }else{
            session()->flash('message','Passwords Did not match.');
            }
            $this->resetInputField();
        }
    }
    
    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }
    
    public function delete()
    {
        Admin::where('id',$this->user_id)->delete();
        session()->flash('message','Admin Deleted Successfully.');
    }
    
    public function render()
    {
         $users = Admin::search($this->search)
         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
         ->Paginate(20);

        return view('livewire.admin-man',[
            'users' => $users,
            'count' => Admin::count()
        ]);
    }
}
