<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GeneralsettingController extends Controller
{
    public function index()
    {
        $data['setings_data'] = Setting::first();
        return view('admin.settings.index',$data);
    }


    public function store(Request $request)
    {

        $id              = $request->settingid;
        $welcome_msg     = $request->welcome_msg;
        $whatsapp_number = $request->whatsapp_number;
        $phone           = $request->phone;
        $mobile          = $request->mobile;
        $email           = $request->email;
        $facebook         = $request->facebook;
        $twitter         = $request->twitter;
        $linkdin         = $request->linkdin;
        $instagram       = $request->instagram;
        $youtube         = $request->youtube;

        $updateddata = array("welcome_msg"=>$welcome_msg,"whatsapp_number"=>$whatsapp_number,"phone"=>$phone,"mobile"=>$mobile,"email"=>$email,"facebook"=>$facebook,"twitter"=>$twitter,"linkdin"=>$linkdin,"instagram"=>$instagram,"youtube"=>$youtube);

        Setting::where('id',$id)->update($updateddata);
        return redirect()->back()->with('success',"General Setting is Update successfully!");

    }
}
