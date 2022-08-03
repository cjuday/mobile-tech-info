<?php
use App\Models\Brand;
use App\Models\Category;
use App\Models\Device;
use App\Models\Admin;
use App\Models\News;
use App\Models\ProductTop;
use App\Models\Launch;
use App\Models\Body;
use App\Models\Display;
use App\Models\Platform;
use App\Models\Memory;
use App\Models\Camera;
use App\Models\SelfieCamera;
use App\Models\KeyBoard;
use App\Models\KeyCaps;
use App\Models\KeySwitch;
use App\Models\GeneralProd;
use App\Models\Battery;
use App\Models\Bluetooth;
use App\Models\ANC;
use App\Models\Control;
use App\Models\Transmitter;
use App\Models\Sound;
use App\Models\Comms;
use App\Models\Features;
use App\Models\MISC;
use App\Models\Network;
use App\Models\Tests;
use App\Models\Shops;
use App\Models\VideoProduct;
use App\Models\Videos;
use App\Models\Buy;
use App\Models\Mail;

function get_brands($id)
{
    $details = Brand::where('cat_id',$id)->get();
    
    return $details;
}

function get_category($id)
{
    $details = Category::where('id',$id)->value('name');
    
    return $details;
}

function get_brand_name($id)
{
    $details = Brand::where('id',$id)->value('name');
    
    return $details;
}

function get_devices($id)
{
    $details = Device::where('brand_id',$id)->orderBy('id','desc')->Paginate(20);
    
    return $details;
}

function get_admin_name($id)
{
    $val = Admin::where('id',$id)->value('name');
    
    return $val;
}

function get_news($id)
{
    $val = News::where('id',$id)->value('title');
    $v[0] = $val;
    $val1 = News::where('id',$id)->value('description');
    $v[1] = $val1;
    $val2 = News::where('id',$id)->value('post_date');
    $v[2] = $val2;
    $val3 = News::where('id',$id)->value('meta_title');
    $v[3] = $val3;
    $val4 = News::where('id',$id)->value('meta_des');
    $v[4] = $val4;
    $val5 = News::where('id',$id)->value('meta_key');
    $v[5] = $val5;

    return $v;
}

function page_top_info($id)
{
    $v = Device::find($id);
    return $v;
}

function page_top_details($id)
{
    $v = ProductTop::find($id);
    return $v;
}

function launch_count($id)
{
    $count = 0;
    $lc = Launch::find($id);

    if($lc)
    {
    if(!is_nullx($lc->announced))
    {
        $count++;
    }
    if(!is_nullx($lc->status))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function launch_det($id)
{
    $v = Launch::find($id);
    return $v;
}

function body_count($id)
{
    $count = 0;
    $lc = Body::find($id);

    if($lc)
    {
    if(!is_nullx($lc->dimension))
    {
        $count++;
    }
    if(!is_nullx($lc->weight))
    {
        $count++;
    }
    if(!is_nullx($lc->build))
    {
        $count++;
    }
    if(!is_nullx($lc->sim))
    {
        $count++;
    }
    if(!is_nullx($lc->sim2))
    {
        $count++;
    }
    if(!is_nullx($lc->sim3))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function body_det($id)
{
    $v = Body::find($id);
    return $v;
}

function display_count($id)
{
    $count = 0;
    $lc = Display::find($id);

    if($lc)
    {
    if(!is_nullx($lc->type))
    {
        $count++;
    }
    if(!is_nullx($lc->size))
    {
        $count++;
    }
    if(!is_nullx($lc->resolution))
    {
        $count++;
    }
    if(!is_nullx($lc->prot1))
    {
        $count++;
    }
    if(!is_nullx($lc->prot2))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function display_det($id)
{
    $v = Display::find($id);
    return $v;
}

function platform_count($id)
{
    $count = 0;
    $lc = Platform::find($id);

    if($lc)
    {
    if(!is_nullx($lc->os))
    {
        $count++;
    }
    if(!is_nullx($lc->chipset))
    {
        $count++;
    }
    if(!is_nullx($lc->chip2))
    {
        $count++;
    }
    if(!is_nullx($lc->cpu))
    {
        $count++;
    }
    if(!is_nullx($lc->cpu2))
    {
        $count++;
    }
    if(!is_nullx($lc->gpu))
    {
        $count++;
    }
    if(!is_nullx($lc->gpu2))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function platform_det($id)
{
    $v = Platform::find($id);
    return $v;
}

function memory_count($id)
{
    $count = 0;
    $lc = Memory::find($id);

    if($lc)
    {
    if(!is_nullx($lc->card_slot))
    {
        $count++;
    }
    if(!is_nullx($lc->internal1))
    {
        $count++;
    }
    if(!is_nullx($lc->internal2))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function memory_det($id)
{
    $v = Memory::find($id);
    return $v;
}

function camera_count($id)
{
    $count = 0;
    $lc = Camera::find($id);

    if($lc)
    {
    if(!is_nullx($lc->cam1))
    {
        $count++;
    }
    if(!is_nullx($lc->cam2))
    {
        $count++;
    }
    if(!is_nullx($lc->cam3))
    {
        $count++;
    }
    if(!is_nullx($lc->cam4))
    {
        $count++;
    }
    if(!is_nullx($lc->cam5))
    {
        $count++;
    }
    if(!is_nullx($lc->cam6))
    {
        $count++;
    }
    if(!is_nullx($lc->features))
    {
        $count++;
    }
    if(!is_nullx($lc->video))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function selfcamera_count($id)
{
    $count = 0;
    $lc = SelfieCamera::find($id);

    if($lc)
    {
    if(!is_nullx($lc->cam1))
    {
        $count++;
    }
    if(!is_nullx($lc->cam2))
    {
        $count++;
    }
    if(!is_nullx($lc->cam3))
    {
        $count++;
    }
    if(!is_nullx($lc->cam4))
    {
        $count++;
    }
    if(!is_nullx($lc->cam5))
    {
        $count++;
    }
    if(!is_nullx($lc->cam6))
    {
        $count++;
    }
    if(!is_nullx($lc->features))
    {
        $count++;
    }
    if(!is_nullx($lc->video))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function camera_det($id)
{
    $v = Camera::find($id);
    return $v;
}

function selfcamera_det($id)
{
    $v = SelfieCamera::find($id);
    return $v;
}

function keyboard_count($id)
{
    $count = 0;
    $lc = KeyBoard::find($id);

    if($lc)
    {
    if(!is_nullx($lc->det1))
    {
        $count++;
    }
    if(!is_nullx($lc->det2))
    {
        $count++;
    }
    if(!is_nullx($lc->det3))
    {
        $count++;
    }
    if(!is_nullx($lc->det4))
    {
        $count++;
    }
    if(!is_nullx($lc->det5))
    {
        $count++;
    }
    if(!is_nullx($lc->det6))
    {
        $count++;
    }
    if(!is_nullx($lc->det7))
    {
        $count++;
    }
    if(!is_nullx($lc->det8))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function keyboard_det($id)
{
    $v = Keyboard::find($id);
    return $v;
}

function keycaps_count($id)
{
    $count = 0;
    $lc = KeyCaps::find($id);

    if($lc)
    {
    if(!is_nullx($lc->types))
    {
        $count++;
    }
    if(!is_nullx($lc->size))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function keycaps_det($id)
{
    $v = KeyCaps::find($id);
    return $v;
}

function keyswitch_count($id)
{
    $count = 0;
    $lc = KeySwitch::find($id);

    if($lc)
    {
    if(!is_nullx($lc->types))
    {
        $count++;
    }
    if(!is_nullx($lc->size))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function keyswitch_det($id)
{
    $v = KeySwitch::find($id);
    return $v;
}

function generalp_count($id)
{
    $count = 0;
    $lc = GeneralProd::find($id);

    if($lc)
    {
    if(!is_nullx($lc->type))
    {
        $count++;
    }
    if(!is_nullx($lc->unit))
    {
        $count++;
    }
    if(!is_nullx($lc->magnet))
    {
        $count++;
    }
    if(!is_nullx($lc->diaphragm))
    {
        $count++;
    }
    if(!is_nullx($lc->fr))
    {
        $count++;
    }
    if(!is_nullx($lc->fra))
    {
        $count++;
    }
    if(!is_nullx($lc->frb))
    {
        $count++;
    }
    if(!is_nullx($lc->sense))
    {
        $count++;
    }
    if(!is_nullx($lc->cord))
    {
        $count++;
    }
    if(!is_nullx($lc->length))
    {
        $count++;
    }
    if(!is_nullx($lc->plug))
    {
        $count++;
    }
    if(!is_nullx($lc->style))
    {
        $count++;
    }
    if(!is_nullx($lc->nfc))
    {
        $count++;
    }
    if(!is_nullx($lc->dsee))
    {
        $count++;
    }
    if(!is_nullx($lc->passive))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function generalp_det($id)
{
    $v = GeneralProd::find($id);
    return $v;
}

function battery_count($id)
{
    $count = 0;
    $lc = Battery::find($id);

    if($lc)
    {
    if(!is_nullx($lc->type))
    {
        $count++;
    }
    if(!is_nullx($lc->charging))
    {
        $count++;
    }
    if(!is_nullx($lc->charging2))
    {
        $count++;
    }
    if(!is_nullx($lc->charging3))
    {
        $count++;
    }
    if(!is_nullx($lc->cont))
    {
        $count++;
    }
    if(!is_nullx($lc->wait))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function battery_det($id)
{
    $v = Battery::find($id);
    return $v;
}

function bluetooth_count($id)
{
    $count = 0;
    $lc = Bluetooth::find($id);

    if($lc)
    {
    if(!is_nullx($lc->version))
    {
        $count++;
    }
    if(!is_nullx($lc->erange))
    {
        $count++;
    }
    if(!is_nullx($lc->frange))
    {
        $count++;
    }
    if(!is_nullx($lc->profile))
    {
        $count++;
    }
    if(!is_nullx($lc->formats))
    {
        $count++;
    }
    if(!is_nullx($lc->prot))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function bluetooth_det($id)
{
    $v = Bluetooth::find($id);
    return $v;
}

function anc_count($id)
{
    $count = 0;
    $lc = Bluetooth::find($id);

    if($lc)
    {
    if(!is_nullx($lc->switch))
    {
        $count++;
    }
    if(!is_nullx($lc->ncopt))
    {
        $count++;
    }
    if(!is_nullx($lc->atm))
    {
        $count++;
    }
    if(!is_nullx($lc->ambs))
    {
        $count++;
    }
    if(!is_nullx($lc->qatt))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function anc_det($id)
{
    $v = ANC::find($id);
    return $v;
}

function control_count($id)
{
    $count = 0;
    $lc = Control::find($id);

    if($lc)
    {
    if(!is_nullx($lc->control))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function control_det($id)
{
    $v = Control::find($id);
    return $v;
}

function trans_count($id)
{
    $count = 0;
    $lc = Transmitter::find($id);

    if($lc)
    {
    if(!is_nullx($lc->input))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function trans_det($id)
{
    $v = Transmitter::find($id);
    return $v;
}

function sound_count($id)
{
    $count = 0;
    $lc = Sound::find($id);

    if($lc)
    {
    if(!is_nullx($lc->loudspeakers))
    {
        $count++;
    }
    if(!is_nullx($lc->jack))
    {
        $count++;
    }
    if(!is_nullx($lc->jack2))
    {
        $count++;
    }
    if(!is_nullx($lc->jack3))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function sound_det($id)
{
    $v = Sound::find($id);
    return $v;
}

function comms_count($id)
{
    $count = 0;
    $lc = Comms::find($id);

    if($lc)
    {
    if(!is_nullx($lc->wlan))
    {
        $count++;
    }
    if(!is_nullx($lc->bluetooth))
    {
        $count++;
    }
    if(!is_nullx($lc->gps))
    {
        $count++;
    }
    if(!is_nullx($lc->nfc))
    {
        $count++;
    }
    if(!is_nullx($lc->radio))
    {
        $count++;
    }
    if(!is_nullx($lc->usb))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function comms_det($id)
{
    $v = Comms::find($id);
    return $v;
}

function feat_count($id)
{
    $count = 0;
    $lc = Features::find($id);

    if($lc)
    {
    if(!is_nullx($lc->sensors))
    {
        $count++;
    }
    if(!is_nullx($lc->sen2))
    {
        $count++;
    }
    if(!is_nullx($lc->sen3))
    {
        $count++;
    }
    if(!is_nullx($lc->sen4))
    {
        $count++;
    }
    if(!is_nullx($lc->sen5))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function feat_det($id)
{
    $v = Features::find($id);
    return $v;
}

function misc_count($id)
{
    $count = 0;
    $lc = MISC::find($id);

    if($lc)
    {
    if(!is_nullx($lc->color))
    {
        $count++;
    }
    if(!is_nullx($lc->models))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function misc_det($id)
{
    $v = MISC::find($id);
    return $v;
}

function net_count($id)
{
    $count = 0;
    $lc = Network::find($id);

    if($lc)
    {
    if(!is_nullx($lc->technology))
    {
        $count++;
    }
    if(!is_nullx($lc->{'2g'}))
    {
        $count++;
    }
    if(!is_nullx($lc->{'3g'}))
    {
        $count++;
    }
    if(!is_nullx($lc->{'4g'}))
    {
        $count++;
    }
    if(!is_nullx($lc->{'5g'}))
    {
        $count++;
    }
    if(!is_nullx($lc->speed))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function net_det($id)
{
    $v = Network::find($id);
    return $v;
}

function tst_count($id)
{
    $count = 0;
    $lc = Tests::find($id);

    if($lc)
    {
    if(!is_nullx($lc->perf1))
    {
        $count++;
    }
    if(!is_nullx($lc->perf2))
    {
        $count++;
    }
    if(!is_nullx($lc->perf3))
    {
        $count++;
    }
    if(!is_nullx($lc->perf4))
    {
        $count++;
    }
    if(!is_nullx($lc->perf5))
    {
        $count++;
    }
    if(!is_nullx($lc->display))
    {
        $count++;
    }
    if(!is_nullx($lc->cam))
    {
        $count++;
    }
    if(!is_nullx($lc->loud))
    {
        $count++;
    }
    if(!is_nullx($lc->batlife))
    {
        $count++;
    }
    }else{
        $count = 0;
    }
    return $count;
}

function tst_det($id)
{
    $v = Tests::find($id);
    return $v;
}

function shop_count($id)
{
    $count = 0;
    $lc = Shops::find($id);

    if($lc)
    {
    if(!is_nullx($lc->var1))
    {
        $count++;
    }
}else{
    $count = 0;
}
return $count;
}

function shop_det($id)
{
    $v = Shops::find($id);
    return $v;
}

function video_data($id)
{
    $v = VideoProduct::find($id);
    return $v;
}

function get_similar($id)
{
    $d = Device::find($id);
    $x = Device::where([['cat_id',$d->cat_id],['id','!=',$d->id],['price','<=',$d->price+3000],['price','>=',$d->price-3000]])->take(4)->get();
    return $x;
}

function latest_news()
{
    return News::orderBy('id','desc')->take(3)->get();
}

function latest_videos()
{
    return Videos::orderBy('id','desc')->take(2)->get();
}

function latest_device()
{
    return Device::orderBy('id','desc')->take(6)->get();
}

function related_device($id)
{
    $dd = Device::find($id);
    $xx = Device::where('brand_id',$dd->brand_id)->take(6)->get();
    return $xx;
}

function get_search($q)
{
    $xxx = Device::where('name','LIKE','%'.$q.'%')->paginate(20);
    return $xxx;
}

function get_search_count($q)
{
    $xx = Device::where('name','LIKE','%'.$q.'%')->count();
    return $xx;
}

function get_arrival($id)
{
    $x = Device::find($id);

    if($x->arrival>0)
    {
        return true;
    }else{
        return false;
    }
}

function get_upcoming($id)
{
    $x = Device::find($id);

    if($x->upcoming>0)
    {
        return true;
    }else{
        return false;
    }
}

function new_arrival_by_catid($id)
{
    return Device::where('cat_id',$id)->where('arrival','1')->take(12)->orderBy('id','desc')->get();
}

function get_frp_by_id($id)
{
    return ProductTop::where('product_id',$id)->value('prc1');
}

function new_arrival_by_catid_all()
{
    return Device::where('arrival','1')->take(12)->orderBy('id','desc')->get();
}

function new_upcoming_by_catid($id)
{
    return Device::where('cat_id',$id)->where('upcoming','1')->take(12)->orderBy('id','desc')->get();
}

function new_upcoming_by_catid_all()
{
    return Device::where('upcoming','1')->take(12)->orderBy('id','desc')->get();
}

function ranges_show($lower, $upper)
{
    if(!is_nullx($upper))
    {
        return Device::where([['price','>=',$lower],['price','<',$upper]])->paginate(20);
    }else{
        return Device::where('price','>=',$lower)->paginate(20);
    }
}

function ranges_count($lower, $upper)
{
    if(!is_nullx($upper))
    {
        return Device::where([['price','>=',$lower],['price','<',$upper]])->count();
    }else{
        return Device::where('price','>=',$lower)->count();
    }
}

function buy_data()
{
    return Buy::orderBy('id','desc')->paginate(20);
}

function buy_count()
{
    return Buy::orderBy('id','desc')->count();
}

function is_nullx($data)
{
    if(is_null($data))
    {
        return true;
    }else if(empty($data))
    {
        return true;
    }else{
        return false;
    }
}

function get_mail_count()
{
    return Mail::where('read_mail','0')->count();
}

function get_relnews()
{
    return News::all()->random(3);
}
?>