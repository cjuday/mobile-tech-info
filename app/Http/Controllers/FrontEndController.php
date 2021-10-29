<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\PriceRanges;
use App\Models\Videos;
use App\Models\Device;
use App\Models\Mail;

class FrontEndController extends Controller
{
    //Home Page Data Distributor
    public function home_data()
    {
        $cats2 = Category::take(6)->get();

        $ranges = PriceRanges::all();

        $news_count = News::count();
        
        $arrival = Category::where('arrival','>','0')->get();
        
        $upcoming = Category::where('upcoming','>','0')->get();

        $news = News::take(5)->orderBy('id','desc')->get();
        
        return view('home')->with('cats2',$cats2)->with('ranges',$ranges)->with('news_count',$news_count)->with('news',$news)->with('arrival',$arrival)->with('upcoming',$upcoming);
    }
    
    //News Page Data Distributor
    public function news_data()
    {
        $count = News::count();

        $news = News::orderBy('id','desc')->paginate(10);
        
        return view('news')->with('count',$count)->with('news',$news);
    }
    
    //Videos Page Data Distributor
    public function videos_data()
    {
        $count = Videos::count();

        $news = Videos::orderBy('id','desc')->paginate(10);
        
        return view('videos')->with('count',$count)->with('news',$news);
    }
    
    //Products Page Data Distributor
    public function products_data($slug)
    {
        $dev_id = Device::where('slug',$slug)->value('id');
        
        return view('products')->with('id',$dev_id);
    }
    
    public function mail_add(Request $request)
    {
        Mail::insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone'=> $request->phone,
        'subject' => $request->subject,
        'msg' => $request->msg,
        'read_mail' => '0']);

        return back()->with('success','Mail Sent Successfully. We will get back to you as soon as possible.');
    }
}
