<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mail;

class Mails extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $updateMode = false;
    public $custs, $email, $name, $phone, $subject, $msg, $user_id;

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
    
    public function render()
    {
        return view('livewire.mails',[
            'users' => Mail::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->Paginate(20),
            'count' => Mail::count(),
        ]);
    }
    
    public function view($id)
    {
        $this->updateMode = true;
        $custs = Mail::where('id',$id)->first();
        $this->email = $custs->email;
        $this->phone = $custs->phone;
        $this->name = $custs->name;
        $this->msg = $custs->msg;
        $this->subject = $custs->subject;
    }
    
    public function cancel()
    {
        $this->updateMode = false;
    }
    
    public function deleteId($id)
    {
        $this->user_id = $id;
    }
    
    public function delete()
    {
        Mail::where('id',$this->user_id)->update(['read_mail'=>'1']);
        session()->flash('message', 'Mail Marked as Read Successfully.');
    }
    
    public function delete2()
    {
        Mail::where('id',$this->user_id)->update(['read_mail'=>'0']);
        session()->flash('message', 'Mail Marked as Unread Successfully.');
    }
    
    public function deletex()
    {
        Mail::where('id',$this->user_id)->delete();
        session()->flash('message', 'Mail Deleted Successfully.');
    }
}
