<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){
        $data['siders'] = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',$data);
    }

    public function create_slider(){
        return view('admin.slider.create');
    }

    public function store_slider(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_height=1006',
        ],
        [
            'image' => 'Slider Image is required.',
            'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
            'image.dimensions' => "Please Upload minimum 1800 X 1012 Width and Height Image."

        ]);
        $title     = $request->title;
        $imageName  =   time().'.'.$request->image->extension();

        $image      =   Slider::create(["title" => $title ,"slider_image" => $imageName]);
        if($image){
            $request->image->move(public_path('slider_images'), $imageName);
            $request->session()->flash('success', 'Slider Add Successfully.');
             return redirect(route('slider'));
        }
    }

    public function edit_slider($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_slider'] = Slider::where('id',$id)->first();
        return view('admin.slider.edit',$data);
    }

    public function update_slider(Request $request){
        $id         = $request->slider_id;
        $title      =   $request->title;
        if($request->image == ""){
            $image      =   Slider::where('id',$id)->update(["title"=>$title,"slider_image" =>$request->old_image]);
            if($image){

                $request->session()->flash('success', 'Slider Update Successfully.');
                return redirect(route('slider'));
            }

        }else{
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_height=1006',
            ],
            [
                'image' => 'Slider Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload minimum 1800 X 1012 Width and Height Image."

            ]);


            $imageName  =   time().'.'.$request->image->extension();
            $image      =   Slider::where('id',$id)->update(["slider_image" => $imageName]);
            if($image){
                $request->image->move(public_path('slider_images'), $imageName);
                $request->session()->flash('success', 'Slider Update Successfully.');
                 return redirect(route('slider'));
            }

        }

    }

    public function delete_slider(Request $request,$id){
        $id = CryptoCode::decrypt($id);
        $Exist_files = Slider::where('id',$id)->first();
        if( file_exists(public_path("slider_images/").$Exist_files->slider_image)) {
           unlink(public_path("slider_images/").$Exist_files->slider_image);
        }
        $slider = Slider::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'Slider Delete Successfully.');
            return redirect(route('slider'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = Slider::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }
    }

}
