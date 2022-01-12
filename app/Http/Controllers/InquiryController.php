<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database;
use App\Models\Inquiry;
use App\Helper\CryptoCode;

class InquiryController extends Controller
{
    public function index(){
        $data['inquiry'] = Inquiry::orderBy('id','desc')->get();
        return view('admin.inquiry.index',$data);
    }

    public function delete_inquiry(Request $request,$id){
        $id = CryptoCode::decrypt($id);


        $slider = Inquiry::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'Inquiry Delete Successfully.');
            return redirect(route('inquiry'));
        }
    }
}
