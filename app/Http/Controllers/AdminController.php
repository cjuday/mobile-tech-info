<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\General;
use App\Models\Device;
use App\Models\News;
use Hash;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required'
        ]);

            $mod = Admin::where('email','=',$request->email)->first();
            if($mod)
            {
                if(Hash::check($request->pass,$mod->password))
                {
                    $request->session()->put('Admin', $mod->id);
                    return redirect('admin/dashboard');
                }else{
                    return back()->with('fail','Incorrect Password.');
                }
            }else{
                return back()->with('fail','No account created with this E-mail.');
            }
    }

    /*Dashboard data*/
    public function dashboard_data()
    {
        $today = Carbon::today();
        $today1 = Carbon::now()->subDays(1);
        $today2 = Carbon::now()->subDays(7);
        $today3 = Carbon::now()->subMonth(1);
        $today4 = Carbon::now()->subYear();
        $today5 = Carbon::now()->subYear(15);
        $data[0] = Analytics::fetchTotalVisitorsAndPageViews(Period::days(0));
        $data[1] = Analytics::fetchTotalVisitorsAndPageViews(Period::create($today2, $today));
        $data[2] = Analytics::fetchTotalVisitorsAndPageViews(Period::create($today3, $today));
        $data[3] = Analytics::fetchTotalVisitorsAndPageViews(Period::create($today4, $today));
        $data[4] = Analytics::fetchUserTypes(Period::days(0));
        $data[5] = Analytics::fetchUserTypes(Period::create($today2, $today));
        $data[6] = Analytics::fetchUserTypes(Period::create($today3, $today));
        $data[7] = Analytics::fetchUserTypes(Period::create($today4, $today));
        $data[8] = Analytics::fetchTotalVisitorsAndPageViews(Period::create($today5, $today));
        $data[9] = Device::count() + News::count() + 15;
        $datadev = Analytics::performQuery(
            Period::years(15),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:deviceCategory'
            ]
        );
        $total = $datadev->rows[1][1] + $datadev->rows[0][1];
        $dt1 = ($datadev->rows[1][1]*100)/$total;
        $data[10] = $dt1;
        $dt2 = ($datadev->rows[0][1]*100)/$total;
        $data[11] = $dt2;
        return view('admin/dashboard')->with(['data' => $data]);
    }

    /*General Settings Data Start*/ 
    public function general_data()
    {
        $d1 = General::find(1);
        $data[0] = $d1->value;

        $d2 = General::find(2);
        $data[1] = $d2->value;

        $d3 = General::find(3);
        $data[2] = $d3->value;

        $d4 = General::find(4);
        $data[3] = $d4->value;

        $d5 = General::find(5);
        $data[4] = $d5->value;

        $d6 = General::find(6);
        $data[5] = $d6->value;

        $d7 = General::find(7);
        $data[6] = $d7->value;

        $d8 = General::find(8);
        $data[7] = $d8->value;
        
        $d9 = General::find(9);
        $data[8] = $d9->value;
            
        $d10 = General::find(10);
        $data[9] = $d10->value;
        
        $d11 = General::find(11);
        $data[10] = $d11->value;

        return view('admin/general')->with(['data' => $data]);
    }

    public function general_data_save(Request $request)
    {
        if(empty($request->title))
        {
            return back()->with('fail','Website Title Can\'t Be Empty!');
        }else{
            General::where('id',1)->update(['value'=>$request->title]);
        }

        if(empty($request->metatitle))
        {
            return back()->with('fail','Meta Title Can\'t Be Empty!');
        }else{
            General::where('id',2)->update(['value'=>$request->metatitle]);
        }

        if(empty($request->metades))
        {
            return back()->with('fail','Meta Description Can\'t Be Empty!');
        }else{
            General::where('id',3)->update(['value'=>$request->metades]);
        }

        if(empty($request->metakey))
        {
            return back()->with('fail','Meta Keyword Can\'t Be Empty!');
        }else{
            General::where('id',4)->update(['value'=>$request->metakey]);
        }

        if(empty($request->youtube))
        {
            return back()->with('fail','Youtube Channel Link Can\'t Be Empty!');
        }else{
            General::where('id',5)->update(['value'=>$request->youtube]);
        }

        if(empty($request->facebook))
        {
            return back()->with('fail','Facebook Page Link Can\'t Be Empty!');
        }else{
            General::where('id',6)->update(['value'=>$request->facebook]);
        }

        if(empty($request->instagram))
        {
            return back()->with('fail','Instagram Profile Link Can\'t Be Empty!');
        }else{
            General::where('id',7)->update(['value'=>$request->instagram]);
        }

        
        if(empty($request->twitter))
        {
            return back()->with('fail','Twitter Profile Link Can\'t Be Empty!');
        }else{
            General::where('id',8)->update(['value'=>$request->twitter]);
        }
        
        if(empty($request->phone))
        {
            return back()->with('fail','Phone Number Can\'t Be Empty!');
        }else{
            General::where('id',9)->update(['value'=>$request->phone]);
        }
        
        if(empty($request->email))
        {
            return back()->with('fail','Email Address Can\'t Be Empty!');
        }else{
            General::where('id',10)->update(['value'=>$request->email]);
        }
        
        if(empty($request->contact))
        {
            return back()->with('fail','Contact Paragraph Can\'t Be Empty!');
        }else{
            General::where('id',11)->update(['value'=>$request->contact]);
        }

        return back()->with('success','General Details Updated Successfully.');
    }
    /*General settings end*/

    /*TinyMCE*/
    public function upload_pic(Request $request)
    {
        $img = $request->file('file')->store('uploads','public');
        return response()->json(['location' => "/storage/$img"]);
    }
    
    /*admin*/
    public function admin_data(Request $request)
    {
        $id = $request->session()->get('Admin');
        
        $data = Admin::find($id);
        
        return view('admin/settings')->with('data',$data);
    }
    
    public function admin_update(Request $request)
    {
        $id1 = $request->session()->get('Admin');
        if(empty($request->pass))
        {
            Admin::where('id','=',$id1)->update(['name'=>$request->name,
                                                 'email'=>$request->email]);
                return back()->with('success','Account Updated Successfully.');
        }else{
            if($request->pass == $request->pass2)
            {
                Admin::where('id','=',$id1)->update(['name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->pass)]);
                return back()->with('success','Account Updated Successfully.');
            }else{
                return back()->with('fail','Passwords did not matched.');
            }
        }
    }
}
