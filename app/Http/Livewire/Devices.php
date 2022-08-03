<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Device;
use Livewire\WithFileUploads;
//Models for insert
use App\Models\ANC;
use App\Models\Battery;
use App\Models\Bluetooth;
use App\Models\Body;
use App\Models\Camera;
use App\Models\Comms;
use App\Models\Control;
use App\Models\Display;
use App\Models\Features;
use App\Models\GeneralProd;
use App\Models\KeyBoard;
use App\Models\KeyCaps;
use App\Models\KeySwitch;
use App\Models\Launch;
use App\Models\Memory;
use App\Models\MISC;
use App\Models\Network;
use App\Models\Platform;
use App\Models\ProductTop;
use App\Models\SelfieCamera;
use App\Models\Shops;
use App\Models\Sound;
use App\Models\Tests;
use App\Models\Transmitter;
use App\Models\VideoProduct;

class Devices extends Component
{
    
    use WithFileUploads;
    use WithPagination;

protected $paginationTheme = 'bootstrap';
public $sortField = 'id';
public $sortAsc = false;
public $search = '';
public $show = 0, $show2 = 0;
public $updateMode = false;
public $custs, $brand_id, $brnds, $prod_id;
//device
public $name, $img_src, $price, $metatitle, $metades, $metakey;
//product top
public $status, $status2, $ddp1, $ddp2, $ddp3, $ddp4, $ds, $dr, $cs, $cr, $rs, $rt, $bs, $bt;
//launch
public $ann, $sta;
//body
public $dime, $weight, $build, $sim, $sim2, $sim3;
//display
public $type, $size, $res, $pro1, $pro2;
//platform
public $os, $chip, $c2, $cpu, $cp2, $gpu, $gp2;
//memory
public $slot, $intr1, $intr2;
//camera
public $cn1, $cam1, $cam2, $cam3, $cam4, $cam5, $cam6, $feat1, $vid1;
//selfie camera
public $cn11, $cam11, $cam12, $cam13, $cam14, $cam15, $cam16, $feat11, $vid11;
//keyboard
public $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8;
//keycaps
public $ty1, $si1;
//keyswitch
public $ty2, $si2;
//general
public $tp, $un, $mgn, $dia, $fr, $fra, $frb, $sens, $ct, $cl, $plug, $style, $nfc, $dsee, $passive;
//battery
public $btyp, $charging, $ch2, $ch3, $msc, $wtime;
//bluetooth
public $vers, $erange, $frange, $prof, $formats, $contprot;
//anc
public $swtch, $nco, $atm, $amb, $qa;
//control
public $contrl;
//transmitter
public $inp;
//sound
public $loud, $jack, $j2, $j3;
//comms
public $wlan, $btth, $gps, $nfcc, $radio, $usb;
//features
public $sensors, $sn2, $sn3, $sn4, $sn5;
//misc
public $clrs, $mdls;
//network
public $tech, $tg, $thg, $fg, $fvg, $speed;
//tests
public $pr1, $pr2, $pr3, $pr4, $pr5, $disp, $cam, $louds, $btl;
//shops
public $vr1, $vrsp1, $vrspc1, $vrsl1, $vrsp2, $vrspc2, $vrsl2;
public $vr2, $vrsp21, $vrspc21, $vrsl21, $vrsp22, $vrspc22, $vrsl22;
public $vr3, $vrsp31, $vrspc31, $vrsl31, $vrsp32, $vrspc32, $vrsl32;
public $vr4, $vrsp41, $vrspc41, $vrsl41, $vrsp42, $vrspc42, $vrsl42;
//video
public $vdlnk;

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
        $brand = Brand::all();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
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
        if($this->show=='0')
        {
            $users = Device::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->Paginate(20);

            $brnd_list = '0';
        }else if($this->show>'0' && $this->show2=='0'){
            $users = Device::search($this->search)
            ->where('cat_id',$this->show)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->Paginate(20);

            $brnd_list = Brand::where('cat_id',$this->show)->get();
        }else{
            $users = Device::search($this->search)
            ->where('cat_id',$this->show)
            ->where('brand_id',$this->show2)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->Paginate(20);

            $brnd_list = Brand::where('cat_id',$this->show)->get();
        }

        return view('livewire.devices',[
            'users' => $users,
            'count' => Device::count(),
            'brnd' => $brnd_list,
            'cats' => Category::all()
        ]);
    }

    public function updatedshow($gg)
    {
        $this->brnds = Brand::where('cat_id',$gg)->get();
    }

    public function store()
    {
        //for device table
        if(!empty($this->img_src))
        {
            $imageName = time().'.'.$this->img_src->extension();
            $this->img_src->storePubliclyAs('public/devices',$imageName);
        }
        $slug = Str::slug($this->name);
        $devicetable = array(
            'name'=>$this->name,
            'cat_id'=>$this->show,
            'brand_id'=>$this->show2,
            'img'=>$imageName,
            'price'=>$this->price,
            'slug'=>$slug,
            'metatitle'=>$this->metatitle,
            'metades'=>$this->metades,
            'metakey'=>$this->metakey
        );
        $id = Device::create($devicetable)->id;

        //product top table
            $proddettable = array(
                'product_id'=>$id,
                'status'=>$this->status,
                'prc1'=>$this->ddp1,
                'prc2'=>$this->ddp2,
                'status2'=>$this->status2,
                'prc3'=>$this->ddp3,
                'prc4'=>$this->ddp4,
                'disp_size'=>$this->ds,
                'disp_res'=>$this->dr,
                'cam_size'=>$this->cs,
                'cam_res'=>$this->cr,
                'ram_size'=>$this->rs,
                'ram_type'=>$this->rt,
                'bat_size'=>$this->bs,
                'bat_type'=>$this->bt
            );
            ProductTop::create($proddettable);

        //launch table
            $launchtable = array(
                'product_id'=>$id,
                'announced'=>$this->ann,
                'status'=>$this->sta
            );
            Launch::create($launchtable);

        //body table
            $bodytable = array(
                'product_id'=>$id,
                'dimension'=>$this->dime,
                'weight'=>$this->weight,
                'build'=>$this->build,
                'sim'=>$this->sim,
                'sim2'=>$this->sim2,
                'sim3'=>$this->sim3
            );
            Body::create($bodytable);

        //display table
            $displaytable = array(
                'product_id'=>$id,
                'type'=>$this->type,
                'size'=>$this->size,
                'resolution'=>$this->res,
                'prot1'=>$this->pro1,
                'prot2'=>$this->pro2
            );
            Display::create($displaytable);

        //platform
            $platformtable = array(
                'product_id'=>$id,
                'os'=>$this->os,
                'chipset'=>$this->chip,
                'chip2'=>$this->c2,
                'cpu'=>$this->cpu,
                'cpu2'=>$this->cp2,
                'gpu'=>$this->gpu,
                'gpu2'=>$this->gp2
            );
            Platform::create($platformtable);

        //memeory
            $memorytable = array(
                'product_id'=>$id,
                'card_slot'=>$this->slot,
                'internal1'=>$this->intr1,
                'internal2'=>$this->intr2
            );
            Memory::create($memorytable);

        //camera
            $cameratable = array(
                'product_id'=>$id,
                'cam_num'=>$this->cn1,
                'cam1'=>$this->cam1,
                'cam2'=>$this->cam2,
                'cam3'=>$this->cam3,
                'cam4'=>$this->cam4,
                'cam5'=>$this->cam5,
                'cam6'=>$this->cam6,
                'features'=>$this->feat1,
                'video'=>$this->vid1
            );
            Camera::create($cameratable);

        //selfie camera
            $selfcameratable = array(
                'product_id'=>$id,
                'cam_num'=>$this->cn11,
                'cam1'=>$this->cam11,
                'cam2'=>$this->cam12,
                'cam3'=>$this->cam13,
                'cam4'=>$this->cam14,
                'cam5'=>$this->cam15,
                'cam6'=>$this->cam16,
                'features'=>$this->feat11,
                'video'=>$this->vid11
            );
            SelfieCamera::create($selfcameratable);

        //keyboard
            $keyboardtable = array(
                'product_id'=>$id,
                'det1'=>$this->d1,
                'det2'=>$this->d2,
                'det3'=>$this->d3,
                'det4'=>$this->d4,
                'det5'=>$this->d5,
                'det6'=>$this->d6,
                'det7'=>$this->d7,
                'det8'=>$this->d8
            );
            KeyBoard::create($keyboardtable);

        //keycaps
            $keycapstable = array(
                'product_id'=>$id,
                'types'=>$this->ty1,
                'size'=>$this->si1
            );
            KeyCaps::create($keycapstable);

        //keyswitch
            $keyswitchtable = array(
                'product_id'=>$id,
                'types'=>$this->ty1,
                'size'=>$this->si1
            );
            KeySwitch::create($keyswitchtable);

        //general
            $generaltable = array(
                'product_id'=>$id,
                'type'=>$this->tp,
                'unit'=>$this->un,
                'magnet'=>$this->mgn,
                'diaphragm'=>$this->dia,
                'fr'=>$this->fr,
                'fra'=>$this->fra,
                'frb'=>$this->frb,
                'sense'=>$this->sens,
                'cord'=>$this->ct,
                'length'=>$this->cl,
                'plug'=>$this->plug,
                'style'=>$this->style,
                'nfc'=>$this->nfc,
                'dsee'=>$this->dsee,
                'passive'=>$this->passive
            );
            GeneralProd::create($generaltable);

        //battery
            $batterytable = array(
                'product_id'=>$id,
                'type'=>$this->btyp,
                'charging'=>$this->charging,
                'charging2'=>$this->ch2,
                'charging3'=>$this->ch3,
                'cont'=>$this->msc,
                'wait'=>$this->wtime
            );
            Battery::create($batterytable);

        //bluetooth
            $bluetoothtable = array(
                'product_id'=>$id,
                'version'=>$this->vers,
                'erange'=>$this->erange,
                'frange'=>$this->frange,
                'profile'=>$this->prof,
                'formats'=>$this->formats,
                'prot'=>$this->contprot
            );
            Bluetooth::create($bluetoothtable);
        
        //anc
            $anctable = array(
                'product_id'=>$id,
                'switch'=>$this->swtch,
                'ncopt'=>$this->nco,
                'atm'=>$this->atm,
                'ambs'=>$this->amb,
                'qatt'=>$this->qa
            );
            ANC::create($anctable);

        //control
            $controltable = array(
                'product_id'=>$id,
                'control'=>$this->contrl
            );
            Control::create($controltable);

        //transmitter
            $tansmittertable = array(
                'product_id'=>$id,
                'input'=>$this->inp
            );
            Transmitter::create($tansmittertable);

        //sound
            $soundtable = array(
                'product_id'=>$id,
                'loudspeakers'=>$this->loud,
                'jack'=>$this->jack,
                'jack2'=>$this->j2,
                'jack3'=>$this->j3
            );
            Sound::create($soundtable);

        //comms
            $commstable = array(
                'product_id'=>$id,
                'wlan'=>$this->wlan,
                'bluetooth'=>$this->btth,
                'gps'=>$this->gps,
                'nfc'=>$this->nfcc,
                'radio'=>$this->radio,
                'usb'=>$this->usb
            );
            Comms::create($commstable);
        
        //features
            $feattable = array(
                'product_id'=>$id,
                'sensors'=>$this->sensors,
                'sen2'=>$this->sn2,
                'sen3'=>$this->sn3,
                'sen4'=>$this->sn4,
                'sen5'=>$this->sn5
            );
            Features::create($feattable);
        
        //misc
            $misctable = array(
                'product_id'=>$id,
                'color'=>$this->clrs,
                'models'=>$this->mdls
            );
            MISC::create($misctable);

        //network
            $nettable = array(
                'product_id'=>$id,
                'technology'=>$this->tech,
                '2g'=>$this->tg,
                '3g'=>$this->thg,
                '4g'=>$this->fg,
                '5g'=>$this->fvg,
                'speed'=>$this->speed
            );
            Network::create($nettable);

        //tests
            $testtable = array(
                'product_id'=>$id,
                'perf1'=>$this->pr1,
                'perf2'=>$this->pr2,
                'perf3'=>$this->pr3,
                'perf4'=>$this->pr4,
                'perf5'=>$this->pr5,
                'display'=>$this->disp,
                'cam'=>$this->cam,
                'loud'=>$this->louds,
                'batlife'=>$this->btl
            );
            Tests::create($testtable);
        
        //shops
        if(!empty($this->vrspc1))
        {
            $imageName1 = time()*time().'.'.$this->vrspc1->extension();
            $this->vrspc1->storePubliclyAs('public/shops',$imageName1);
        }else{
            $imageName1 = NULL;
        }
        if(!empty($this->vrspc2))
        {
            $imageName2 = time()+time().'.'.$this->vrspc2->extension();
            $this->vrspc2->storePubliclyAs('public/shops',$imageName2);
        }else{
            $imageName2 = NULL;
        }

        if(!empty($this->vrspc21))
        {
            $imageName21 = time()*2*time().'.'.$this->vrspc21->extension();
            $this->vrspc21->storePubliclyAs('public/shops',$imageName21);
        }else{
            $imageName21 = NULL;
        }
        if(!empty($this->vrspc22))
        {
            $imageName22 = time()*3*time().'.'.$this->vrspc22->extension();
            $this->vrspc22->storePubliclyAs('public/shops',$imageName22);
        }else{
            $imageName22 = NULL;
        }

        if(!empty($this->vrspc31))
        {
            $imageName31 = time()*4*time().'.'.$this->vrspc31->extension();
            $this->vrspc31->storePubliclyAs('public/shops',$imageName31);
        }else{
            $imageName31 = NULL;
        }
        if(!empty($this->vrspc32))
        {
            $imageName32 = time()*5*time().'.'.$this->vrspc32->extension();
            $this->vrspc32->storePubliclyAs('public/shops',$imageName32);
        }else{
            $imageName32 = NULL;
        }

        if(!empty($this->vrspc41))
        {
            $imageName41 = time()*6*time().'.'.$this->vrspc41->extension();
            $this->vrspc41->storePubliclyAs('public/shops',$imageName41);
        }else{
            $imageName41 = NULL;
        }
        if(!empty($this->vrspc42))
        {
            $imageName42 = time()*7*time().'.'.$this->vrspc42->extension();
            $this->vrspc42->storePubliclyAs('public/shops',$imageName42);
        }else{
            $imageName42 = NULL;
        }

            $shoptable = array(
                'product_id'=>$id,
                'var1'=>$this->vr1,
                'shop11_prc'=>$this->vrsp1,
                'shop11_img'=>$imageName1,
                'shop12_prc'=>$this->vrsp2,
                'shop12_img'=>$imageName2,
                'var2'=>$this->vr2,
                'shop21_prc'=>$this->vrsp21,
                'shop21_img'=>$imageName21,
                'shop22_prc'=>$this->vrsp22,
                'shop22_img'=>$imageName22,
                'var3'=>$this->vr3,
                'shop31_prc'=>$this->vrsp31,
                'shop31_img'=>$imageName31,
                'shop32_prc'=>$this->vrsp32,
                'shop32_img'=>$imageName32,
                'var4'=>$this->vr4,
                'shop41_prc'=>$this->vrsp41,
                'shop41_img'=>$imageName41,
                'shop42_prc'=>$this->vrsp42,
                'shop42_img'=>$imageName42,
                'shop11_lnk'=>$this->vrsl1,
                'shop12_lnk'=>$this->vrsl2,
                'shop21_lnk'=>$this->vrsl21,
                'shop22_lnk'=>$this->vrsl22,
                'shop31_lnk'=>$this->vrsl31,
                'shop32_lnk'=>$this->vrsl32,
                'shop41_lnk'=>$this->vrsl41,
                'shop42_lnk'=>$this->vrsl42
            );
            Shops::create($shoptable);

            //video
            if(!empty($this->vdlnk))
            {
                $lnk = explode('v=',$this->vdlnk);

                if(strpos($lnk[1],'&'))
                {
                    $lnk_last = explode('&',$lnk[1]);
                    $final_lnk = $lnk_last[0];
                }else{
                    $final_lnk = $lnk[1];
                }
            }else{
                $final_lnk = NULL;
            }
                $videotable = array(
                    'product_id'=>$id,
                    'link' => $this->vdlnk,
                    'video_id' => $final_lnk
                );
                VideoProduct::create($videotable);
                

        session()->flash('message', 'Device Added Successfully.');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name=""; 
$this->img_src=""; 
$this->price=""; 
$this->metatitle=""; 
$this->metades=""; 
$this->metakey="";
$this->show = "0";
$this->show2 = "0";

$this->status=""; 
$this->ddp1=""; 
$this->ddp2=""; 
$this->ddp3=""; 
$this->ddp4=""; 
$this->ds=""; 
$this->dr=""; 
$this->cs=""; 
$this->cr=""; 
$this->rs=""; 
$this->rt=""; 
$this->bs=""; 
$this->bt="";

$this->ann=""; 
$this->sta="";

$this->dime=""; 
$this->weight=""; 
$this->build=""; 
$this->sim="";

$this->type=""; 
$this->size=""; 
$this->res=""; 
$this->pro1=""; 
$this->pro2="";

$this->os=""; 
$this->chip=""; 
$this->cpu=""; 
$this->gpu="";

$this->slot=""; 
$this->intr1=""; 
$this->intr2="";

$this->cn1=""; 
$this->cam1=""; 
$this->cam2=""; 
$this->cam3=""; 
$this->cam4=""; 
$this->cam5=""; 
$this->cam6=""; 
$this->feat1=""; 
$this->vid1="";

$this->cn11=""; 
$this->cam11=""; 
$this->cam12=""; 
$this->cam13=""; 
$this->cam14=""; 
$this->cam15=""; 
$this->cam16=""; 
$this->feat11=""; 
$this->vid11="";

$this->d1=""; 
$this->d2=""; 
$this->d3=""; 
$this->d4=""; 
$this->d5=""; 
$this->d6=""; 
$this->d7=""; 
$this->d8="";

$this->ty1=""; 
$this->si1="";

$this->ty2="";
$this->si2="";
 
$this->tp=""; 
$this->un=""; 
$this->mgn=""; 
$this->dia=""; 
$this->fr=""; 
$this->fra=""; 
$this->frb=""; 
$this->sens=""; 
$this->ct=""; 
$this->cl=""; 
$this->plug=""; 
$this->style=""; 
$this->nfc=""; 
$this->dsee=""; 
$this->passive="";

$this->btyp=""; 
$this->charging=""; 
$this->msc=""; 
$this->wtime="";

$this->vers=""; 
$this->erange=""; 
$this->frange="";
$this->prof=""; 
$this->formats=""; 
$this->contprot="";
 
$this->swtch=""; 
$this->nco=""; 
$this->atm=""; 
$this->amb=""; 
$this->qa="";

$this->contrl="";

$this->inp="";
 
$this->loud=""; 
$this->jack="";

$this->wlan=""; 
$this->btth=""; 
$this->gps=""; 
$this->nfcc=""; 
$this->radio=""; 
$this->usb="";

$this->sensors="";

$this->clrs=""; 
$this->mdls="";
 
$this->tech=""; 
$this->tg=""; 
$this->thg=""; 
$this->fg=""; 
$this->fvg=""; 
$this->speed="";

$this->pr1=""; 
$this->pr2=""; 
$this->pr3=""; 
$this->pr4=""; 
$this->pr5=""; 
$this->disp=""; 
$this->cam=""; 
$this->louds=""; 
$this->btl="";

$this->vr1=""; 
$this->vrsp1=""; 
$this->vrspc1=""; 
$this->vrsl1=""; 
$this->vrsp2=""; 
$this->vrspc2=""; 
$this->vrsl2="";

$this->vr2=""; 
$this->vrsp21=""; 
$this->vrspc21=""; 
$this->vrsl21=""; 
$this->vrsp22=""; 
$this->vrspc22=""; 
$this->vrsl22="";

$this->vr3=""; 
$this->vrsp31=""; 
$this->vrspc31=""; 
$this->vrsl31=""; 
$this->vrsp32=""; 
$this->vrspc32=""; 
$this->vrsl32="";

$this->vr4=""; 
$this->vrsp41=""; 
$this->vrspc41=""; 
$this->vrsl41=""; 
$this->vrsp42=""; 
$this->vrspc42=""; 
$this->vrsl42="";
$this->sim2="";
$this->sim3="";
$this->c2 ="";
$this->cp2 ="";
$this->gp2="";
$this->j2="";
$this->j3="";
$this->sn2="";
$this->sn3="";
$this->sn4="";
$this->sn5="";
$this->ch2="";
$this->ch3="";
$this->vdlnk="";
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->prod_id = $id;
        $custs = Device::where('id',$id)->first();
        $this->name=$custs->name; 
$this->price=$custs->price; 
$this->metatitle=$custs->metatitle; 
$this->metades=$custs->metades; 
$this->metakey=$custs->metakey;

$custs = ProductTop::where('product_id',$id)->first();
$this->status=$custs->status; 
$this->ddp1=$custs->prc1; 
$this->ddp2=$custs->prc2; 
$this->ddp3=$custs->prc3; 
$this->ddp4=$custs->prc4; 
$this->ds=$custs->disp_size; 
$this->dr=$custs->disp_res; 
$this->cs=$custs->cam_size; 
$this->cr=$custs->cam_res; 
$this->rs=$custs->ram_size; 
$this->rt=$custs->ram_type; 
$this->bs=$custs->bat_size; 
$this->bt=$custs->bat_type;

$custs = Launch::where('product_id',$id)->first();
$this->ann=$custs->announced; 
$this->sta=$custs->status;

$custs = Body::where('product_id',$id)->first();
$this->dime=$custs->dimension; 
$this->weight=$custs->weight; 
$this->build=$custs->build; 
$this->sim=$custs->sim;
$this->sim2=$custs->sim2;
$this->sim3=$custs->sim3;

$custs = Display::where('product_id',$id)->first();
$this->type=$custs->type; 
$this->size=$custs->size; 
$this->res=$custs->resolution; 
$this->pro1=$custs->prot1; 
$this->pro2=$custs->prot2;

$custs = Platform::where('product_id',$id)->first();
$this->os=$custs->os; 
$this->chip=$custs->chipset; 
$this->cpu=$custs->cpu; 
$this->gpu=$custs->gpu;
$this->c2 =$custs->chip2;
$this->cp2 =$custs->cpu2; 
$this->gp2=$custs->gpu2;

$custs = Memory::where('product_id',$id)->first();
$this->slot=$custs->card_slot; 
$this->intr1=$custs->internal1; 
$this->intr2=$custs->internal2;

$custs = Camera::where('product_id',$id)->first();
$this->cn1=$custs->cam_num; 
$this->cam1=$custs->cam1; 
$this->cam2=$custs->cam2; 
$this->cam3=$custs->cam3; 
$this->cam4=$custs->cam4; 
$this->cam5=$custs->cam5; 
$this->cam6=$custs->cam6; 
$this->feat1=$custs->features; 
$this->vid1=$custs->video;

$custs = SelfieCamera::where('product_id',$id)->first();
$this->cn11=$custs->cam_num; 
$this->cam11=$custs->cam1; 
$this->cam12=$custs->cam2; 
$this->cam13=$custs->cam3; 
$this->cam14=$custs->cam4; 
$this->cam15=$custs->cam5; 
$this->cam16=$custs->cam6; 
$this->feat11=$custs->features; 
$this->vid11=$custs->video;

$custs = KeyBoard::where('product_id',$id)->first();
$this->d1=$custs->det1; 
$this->d2=$custs->det2; 
$this->d3=$custs->det3; 
$this->d4=$custs->det4; 
$this->d5=$custs->det5; 
$this->d6=$custs->det6; 
$this->d7=$custs->det7; 
$this->d8=$custs->det8;

$custs = KeyCaps::where('product_id',$id)->first();
$this->ty1=$custs->types; 
$this->si1=$custs->size;

$custs = KeySwitch::where('product_id',$id)->first();
$this->ty2=$custs->types;
$this->si2=$custs->size;
 
$custs = GeneralProd::where('product_id',$id)->first();
$this->tp=$custs->type; 
$this->un=$custs->unit; 
$this->mgn=$custs->magnet; 
$this->dia=$custs->diaphragm; 
$this->fr=$custs->fr; 
$this->fra=$custs->fra; 
$this->frb=$custs->frb; 
$this->sens=$custs->sense; 
$this->ct=$custs->cord; 
$this->cl=$custs->length; 
$this->plug=$custs->plug; 
$this->style=$custs->style; 
$this->nfc=$custs->nfc; 
$this->dsee=$custs->dsee; 
$this->passive=$custs->passive;

$custs = Battery::where('product_id',$id)->first();
$this->btyp=$custs->type; 
$this->charging=$custs->charging; 
$this->ch2=$custs->charging2;
$this->ch3=$custs->charging3;
$this->msc=$custs->cont; 
$this->wtime=$custs->wait;

$custs = Bluetooth::where('product_id',$id)->first();
$this->vers=$custs->version; 
$this->erange=$custs->erange; 
$this->frange=$custs->frnage;
$this->prof=$custs->profile; 
$this->formats=$custs->formats; 
$this->contprot=$custs->prot;

$custs = ANC::where('product_id',$id)->first();
$this->swtch=$custs->switch; 
$this->nco=$custs->ncopt; 
$this->atm=$custs->atm; 
$this->amb=$custs->ambs; 
$this->qa=$custs->qatt;

$custs = Control::where('product_id',$id)->first();
$this->contrl=$custs->control;

$custs = Transmitter::where('product_id',$id)->first();
$this->inp=$custs->input;
 
$custs = Sound::where('product_id',$id)->first();
$this->loud=$custs->loudspeakers; 
$this->jack=$custs->jack;
$this->j2=$custs->jack2;
$this->j3=$custs->jack3;

$custs = Comms::where('product_id',$id)->first();
$this->wlan=$custs->wlan; 
$this->btth=$custs->bluetooth; 
$this->gps=$custs->gps; 
$this->nfcc=$custs->nfc; 
$this->radio=$custs->radio; 
$this->usb=$custs->usb;

$custs = Features::where('product_id',$id)->first();
$this->sensors=$custs->sensors;
$this->sn2=$custs->sen2;
$this->sn3=$custs->sen3;
$this->sn4=$custs->sen4;
$this->sn5=$custs->sen5;

$custs = MISC::where('product_id',$id)->first();
$this->clrs=$custs->color; 
$this->mdls=$custs->models;
 
$custs = Network::where('product_id',$id)->first();
$this->tech=$custs->technology; 
$this->tg=$custs->{'2g'}; 
$this->thg=$custs->{'3g'}; 
$this->fg=$custs->{'4g'}; 
$this->fvg=$custs->{'5g'}; 
$this->speed=$custs->speed;

$custs = Tests::where('product_id',$id)->first();
$this->pr1=$custs->perf1; 
$this->pr2=$custs->perf2; 
$this->pr3=$custs->perf3; 
$this->pr4=$custs->perf4; 
$this->pr5=$custs->perf5; 
$this->disp=$custs->display; 
$this->cam=$custs->cam; 
$this->louds=$custs->loud; 
$this->btl=$custs->batlife;

$custs = Shops::where('product_id',$id)->first();
$this->vr1=$custs->var1; 
$this->vrsp1=$custs->shop11_prc; 
$this->vrsl1=$custs->shop11_lnk; 
$this->vrsp2=$custs->shop12_prc;  
$this->vrsl2=$custs->shop12_lnk;

$this->vr2=$custs->var2; 
$this->vrsp21=$custs->shop21_prc; 
$this->vrsl21=$custs->shop21_lnk; 
$this->vrsp22=$custs->shop22_prc; 
$this->vrsl22=$custs->shop22_lnk;

$this->vr3=$custs->var3; 
$this->vrsp31=$custs->shop31_prc; 
$this->vrsl31=$custs->shop31_lnk; 
$this->vrsp32=$custs->shop32_prc; 
$this->vrsl32=$custs->shop32_lnk;

$this->vr4=$custs->var4; 
$this->vrsp41=$custs->shop41_prc; 
$this->vrsl41=$custs->shop41_lnk; 
$this->vrsp42=$custs->shop42_prc; 
$this->vrsl42=$custs->shop42_lnk;

$custs = VideoProduct::where('product_id',$id)->first();
$this->vdlnk=$custs->link;
    }

    public function update()
    {
        $id = $this->prod_id;
        //for device table
        $custs = Device::find($id);
        if(!empty($this->img_src))
        {
            $imageName = time().'.'.$this->img_src->extension();
            $this->img_src->storePubliclyAs('public/devices',$imageName);
        }else{
            $imageName = $custs->img;
        }

        if($this->show == '0')
        {
            $this->show = $custs->cat_id;
        }

        if($this->show2 == '0')
        {
            $this->show2 = $custs->brand_id;
        }

        Device::where('id',$id)->update([
            'name'=>$this->name,
            'cat_id'=>$this->show,
            'brand_id'=>$this->show2,
            'img'=>$imageName,
            'price'=>$this->price,
            'metatitle'=>$this->metatitle,
            'metades'=>$this->metades,
            'metakey'=>$this->metakey
        ]);

        
        //product top table
        ProductTop::where('product_id',$id)->update([
            'status'=>$this->status,
            'prc1'=>$this->ddp1,
            'prc2'=>$this->ddp2,
            'status2'=>$this->status2,
            'prc3'=>$this->ddp3,
            'prc4'=>$this->ddp4,
            'disp_size'=>$this->ds,
            'disp_res'=>$this->dr,
            'cam_size'=>$this->cs,
            'cam_res'=>$this->cr,
            'ram_size'=>$this->rs,
            'ram_type'=>$this->rt,
            'bat_size'=>$this->bs,
            'bat_type'=>$this->bt
            ]);

    //launch table
        Launch::where('product_id',$id)->update([
            'announced'=>$this->ann,
            'status'=>$this->sta
        ]);

    //body table
        Body::where('product_id',$id)->update([
            'product_id'=>$id,
            'dimension'=>$this->dime,
            'weight'=>$this->weight,
            'build'=>$this->build,
            'sim'=>$this->sim,
            'sim2'=>$this->sim2,
            'sim3'=>$this->sim3
        ]);

    //display table
        Display::where('product_id',$id)->update([
            'type'=>$this->type,
            'size'=>$this->size,
            'resolution'=>$this->res,
            'prot1'=>$this->pro1,
            'prot2'=>$this->pro2
        ]);

    //platform
        Platform::where('product_id',$id)->update([
            'os'=>$this->os,
            'chipset'=>$this->chip,
            'chip2'=>$this->c2,
            'cpu'=>$this->cpu,
            'cpu2'=>$this->cp2,
            'gpu'=>$this->gpu,
            'gpu2'=>$this->gp2
        ]);

    //memeory
        Memory::where('product_id',$id)->update([
            'card_slot'=>$this->slot,
            'internal1'=>$this->intr1,
            'internal2'=>$this->intr2
        ]);

    //camera
    Camera::where('product_id',$id)->update([
            'cam_num'=>$this->cn1,
            'cam1'=>$this->cam1,
            'cam2'=>$this->cam2,
            'cam3'=>$this->cam3,
            'cam4'=>$this->cam4,
            'cam5'=>$this->cam5,
            'cam6'=>$this->cam6,
            'features'=>$this->feat1,
            'video'=>$this->vid1
    ]);

    //selfie camera
    SelfieCamera::where('product_id',$id)->update([
            'cam_num'=>$this->cn11,
            'cam1'=>$this->cam11,
            'cam2'=>$this->cam12,
            'cam3'=>$this->cam13,
            'cam4'=>$this->cam14,
            'cam5'=>$this->cam15,
            'cam6'=>$this->cam16,
            'features'=>$this->feat11,
            'video'=>$this->vid11
    ]);

    //keyboard
            KeyBoard::where('product_id',$id)->update([
            'det1'=>$this->d1,
            'det2'=>$this->d2,
            'det3'=>$this->d3,
            'det4'=>$this->d4,
            'det5'=>$this->d5,
            'det6'=>$this->d6,
            'det7'=>$this->d7,
            'det8'=>$this->d8
        ]);

    //keycaps
        KeySwitch::where('product_id',$id)->update([
            'types'=>$this->ty1,
            'size'=>$this->si1
        ]);

    //keyswitch
        KeySwitch::where('product_id',$id)->update([
            'types'=>$this->ty1,
            'size'=>$this->si1
        ]);

    //general
        GeneralProd::where('product_id',$id)->update([
            'type'=>$this->tp,
            'unit'=>$this->un,
            'magnet'=>$this->mgn,
            'diaphragm'=>$this->dia,
            'fr'=>$this->fr,
            'fra'=>$this->fra,
            'frb'=>$this->frb,
            'sense'=>$this->sens,
            'cord'=>$this->ct,
            'length'=>$this->cl,
            'plug'=>$this->plug,
            'style'=>$this->style,
            'nfc'=>$this->nfc,
            'dsee'=>$this->dsee,
            'passive'=>$this->passive
        ]);

    //battery
        Battery::where('product_id',$id)->update([
            'type'=>$this->btyp,
            'charging'=>$this->charging,
            'charging2'=>$this->ch2,
            'charging3'=>$this->ch3,
            'cont'=>$this->msc,
            'wait'=>$this->wtime
        ]);

    //bluetooth
        Bluetooth::where('product_id',$id)->update([
            'version'=>$this->vers,
            'erange'=>$this->erange,
            'frange'=>$this->frange,
            'profile'=>$this->prof,
            'formats'=>$this->formats,
            'prot'=>$this->contprot
        ]);
    
    //anc
        ANC::where('product_id',$id)->update([
            'switch'=>$this->swtch,
            'ncopt'=>$this->nco,
            'atm'=>$this->atm,
            'ambs'=>$this->amb,
            'qatt'=>$this->qa
    ]);

    //control
        Control::where('product_id',$id)->update([
            'control'=>$this->contrl
    ]);

    //transmitter
        Transmitter::where('product_id',$id)->update([
            'input'=>$this->inp
        ]);

    //sound
        Sound::where('product_id',$id)->update([
            'loudspeakers'=>$this->loud,
            'jack'=>$this->jack,
            'jack2'=>$this->j2,
            'jack3'=>$this->j3
        ]);

    //comms
        Comms::where('product_id',$id)->update([
            'wlan'=>$this->wlan,
            'bluetooth'=>$this->btth,
            'gps'=>$this->gps,
            'nfc'=>$this->nfcc,
            'radio'=>$this->radio,
            'usb'=>$this->usb
        ]);
    
    //features
        Features::where('product_id',$id)->update([
            'sensors'=>$this->sensors,
            'sen2'=>$this->sn2,
            'sen3'=>$this->sn3,
            'sen4'=>$this->sn4,
            'sen5'=>$this->sn5
        ]);
    
    //misc
        MISC::where('product_id',$id)->update([
            'color'=>$this->clrs,
            'models'=>$this->mdls
        ]);

    //network
        Network::where('product_id',$id)->update([
            'technology'=>$this->tech,
            '2g'=>$this->tg,
            '3g'=>$this->thg,
            '4g'=>$this->fg,
            '5g'=>$this->fvg,
            'speed'=>$this->speed
        ]);

    //tests
        Tests::where('product_id',$id)->update([
            'perf1'=>$this->pr1,
            'perf2'=>$this->pr2,
            'perf3'=>$this->pr3,
            'perf4'=>$this->pr4,
            'perf5'=>$this->pr5,
            'display'=>$this->disp,
            'cam'=>$this->cam,
            'loud'=>$this->louds,
            'batlife'=>$this->btl
        ]);
    
    //shops
    $custs = Shops::find($id);
    if(!empty($this->vrspc1))
    {
        $imageName1 = time()*time().'.'.$this->vrspc1->extension();
        $this->vrspc1->storePubliclyAs('public/shops',$imageName1);
    }else{
        $imageName1 = $custs->shop11_img;
    }
    if(!empty($this->vrspc2))
    {
        $imageName2 = time()+time().'.'.$this->vrspc2->extension();
        $this->vrspc2->storePubliclyAs('public/shops',$imageName2);
    }else{
        $imageName2 = $custs->shop12_img;
    }

    if(!empty($this->vrspc21))
    {
        $imageName21 = time()*2*time().'.'.$this->vrspc21->extension();
        $this->vrspc21->storePubliclyAs('public/shops',$imageName21);
    }else{
        $imageName21 = $custs->shop21_img;
    }
    if(!empty($this->vrspc22))
    {
        $imageName22 = time()*3*time().'.'.$this->vrspc22->extension();
        $this->vrspc22->storePubliclyAs('public/shops',$imageName22);
    }else{
        $imageName22 = $custs->shop22_img;
    }

    if(!empty($this->vrspc31))
    {
        $imageName31 = time()*4*time().'.'.$this->vrspc31->extension();
        $this->vrspc31->storePubliclyAs('public/shops',$imageName31);
    }else{
        $imageName31 = $custs->shop31_img;
    }
    if(!empty($this->vrspc32))
    {
        $imageName32 = time()*5*time().'.'.$this->vrspc32->extension();
        $this->vrspc32->storePubliclyAs('public/shops',$imageName32);
    }else{
        $imageName32 = $custs->shop32_img;
    }

    if(!empty($this->vrspc41))
    {
        $imageName41 = time()*6*time().'.'.$this->vrspc41->extension();
        $this->vrspc41->storePubliclyAs('public/shops',$imageName41);
    }else{
        $imageName41 = $custs->shop41_img;
    }
    if(!empty($this->vrspc42))
    {
        $imageName42 = time()*7*time().'.'.$this->vrspc42->extension();
        $this->vrspc42->storePubliclyAs('public/shops',$imageName42);
    }else{
        $imageName42 = $custs->shop42_img;
    }

    Shops::where('product_id',$id)->update([
            'var1'=>$this->vr1,
            'shop11_prc'=>$this->vrsp1,
            'shop11_img'=>$imageName1,
            'shop12_prc'=>$this->vrsp2,
            'shop12_img'=>$imageName2,
            'var2'=>$this->vr2,
            'shop21_prc'=>$this->vrsp21,
            'shop21_img'=>$imageName21,
            'shop22_prc'=>$this->vrsp22,
            'shop22_img'=>$imageName22,
            'var3'=>$this->vr3,
            'shop31_prc'=>$this->vrsp31,
            'shop31_img'=>$imageName31,
            'shop32_prc'=>$this->vrsp32,
            'shop32_img'=>$imageName32,
            'var4'=>$this->vr4,
            'shop41_prc'=>$this->vrsp41,
            'shop41_img'=>$imageName41,
            'shop42_prc'=>$this->vrsp42,
            'shop42_img'=>$imageName42,
            'shop11_lnk'=>$this->vrsl1,
            'shop12_lnk'=>$this->vrsl2,
            'shop21_lnk'=>$this->vrsl21,
            'shop22_lnk'=>$this->vrsl22,
            'shop31_lnk'=>$this->vrsl31,
            'shop32_lnk'=>$this->vrsl32,
            'shop41_lnk'=>$this->vrsl41,
            'shop42_lnk'=>$this->vrsl42
    ]);

        //video
        if(!empty($this->vdlnk))
        {
            $lnk = explode('v=',$this->vdlnk);

            if(strpos($lnk[1],'&'))
            {
                $lnk_last = explode('&',$lnk[1]);
                $final_lnk = $lnk_last[0];
            }else{
                $final_lnk = $lnk[1];
            }
        }else{
            $final_lnk = NULL;
        }
            VideoProduct::where('product_id',$id)->update([
                'link' => $this->vdlnk,
                'video_id' => $final_lnk
            ]);

        session()->flash('message', 'Device Updated Successfully.');
        $this->resetInputFields();
    }

    public function deleteId($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }
    public function arrivalID($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }
    public function upcomingID($id)
    {
        $this->updateMode = true;
        $this->user_id = $id;
    }

    public function arrival()
    {
        Device::where('id',$this->user_id)->update(['arrival'=>'1']);
        
        session()->flash('message', 'Device Added To New Arrival Successfully.');
    }

    public function unarrival()
    {
        Device::where('id',$this->user_id)->update(['arrival'=>'0']);
        
        session()->flash('message', 'Device Removed From New Arrival Successfully.');
    }
    

    public function upcoming()
    {
        Device::where('id',$this->user_id)->update(['upcoming'=>'1']);
        
        session()->flash('message', 'Device Added To Upcoming Successfully.');
    }

    public function unupcoming()
    {
        Device::where('id',$this->user_id)->update(['upcoming'=>'0']);
        
        session()->flash('message', 'Device Removed From Upcoming Successfully.');
    }

    public function delete()
    {
        Device::find($this->user_id)->delete();
ANC::find($this->user_id)->delete();
Battery::find($this->user_id)->delete();
Bluetooth::find($this->user_id)->delete();
Body::find($this->user_id)->delete();
Camera::find($this->user_id)->delete();
Comms::find($this->user_id)->delete();
Control::find($this->user_id)->delete();
Display::find($this->user_id)->delete();
Features::find($this->user_id)->delete();
GeneralProd::find($this->user_id)->delete();
KeyBoard::find($this->user_id)->delete();
KeyCaps::find($this->user_id)->delete();
KeySwitch::find($this->user_id)->delete();
Launch::find($this->user_id)->delete();
Memory::find($this->user_id)->delete();
MISC::find($this->user_id)->delete();
Network::find($this->user_id)->delete();
Platform::find($this->user_id)->delete();
ProductTop::find($this->user_id)->delete();
SelfieCamera::find($this->user_id)->delete();
Shops::find($this->user_id)->delete();
Sound::find($this->user_id)->delete();
Tests::find($this->user_id)->delete();
Transmitter::find($this->user_id)->delete();
VideoProduct::find($this->user_id)->delete();
        session()->flash('message', 'Device Deleted Successfully.');
    }
}
