<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Buy;
use Livewire\WithFileUploads;

class BuyNow extends Component
{
    use WithFileUploads;
        use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $sortField = 'id';
    public $sortAsc = false;
    public $search = '';
    public $show = 0;
    public $updateMode = false;
    public $custs, $title, $img_src, $spec, $des, $shop, $ram, $img_srcx, $price;

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

    public function render()
    {
         $users = Buy::search($this->search)
         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
         ->Paginate(20);

        return view('livewire.buy-now',[
            'users' => $users,
            'count' => Buy::count()
        ]);
    }

    public function cancel()
    {
        $this->updateMode = false;
    }

    public function resetInputFields()
    {
        $this->title = "";
        $this->img_src="";
        $this->spec="";
        $this->des="";
        $this->shop="";
        $this->ram="";
        $this->img_srcx="";
        $this->price="";
    }

    public function store()
    {
        if(!empty($this->img_src))
        {
            $imageName = time().'.'.$this->img_src->extension();
            $this->img_src->storePubliclyAs('public/devices',$imageName);
        }
        if(!empty($this->img_srcx))
        {
            $imageName2 = 2*time().'.'.$this->img_srcx->extension();
            $this->img_srcx->storePubliclyAs('public/shops',$imageName2);
        }
        $data = array(
            'title'=>$this->title,
            'img'=>$imageName,
            'spec_link'=>$this->spec,
            'des'=>$this->des,
            'shop_link'=>$this->shop,
            'ram'=>$this->ram,
            'shop_img'=>$imageName2,
            'price'=>$this->price
        );

        Buy::create($data);

        session()->flash('message','Buying Option Added Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
        $custs = Buy::where('id',$this->user_id)->first();
        $this->title = $custs->title;
        $this->spec = $custs->spec_link;
        $this->des = $custs->des;
        $this->shop = $custs->shop_link;
        $this->ram = $custs->ram;
        $this->price = $custs->price;
    }

    public function update()
    {
        $id = $this->user_id;
        $dt = Buy::where('id',$id)->first();
        if(!empty($this->img_src))
        {
            $imageName = time().'.'.$this->img_src->extension();
            $this->img_src->storePubliclyAs('public/devices',$imageName);
        }else{
            $imageName = $dt->img;
        }
        if(!empty($this->img_srcx))
        {
            $imageName2 = 2*time().'.'.$this->img_srcx->extension();
            $this->img_srcx->storePubliclyAs('public/shops',$imageName2);
        }else{
            $imageName2 = $dt->shop_img;
        }

        Buy::where('id',$id)->update([
            'title'=>$this->title,
            'img'=>$imageName,
            'spec_link'=>$this->spec,
            'des'=>$this->des,
            'shop_link'=>$this->shop,
            'ram'=>$this->ram,
            'shop_img'=>$imageName2,
            'price'=>$this->price
        ]);

        session()->flash('message','Buying Option Updated Successfully.');
        $this->resetInputFields();
    }

    public function deleteId($id)
    {
        $this->user_id = $id;
    }

    public function delete()
    {
        Buy::where('id',$this->user_id)->delete();
        session()->flash('message','Buying Option Deleted Successfully.');
        $this->resetInputFields();
    }
}
