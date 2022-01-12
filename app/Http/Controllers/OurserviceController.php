<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ourservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;
use Illuminate\Support\Str;

class OurserviceController extends Controller
{
    public function index(){
        $data['ourservice'] = Ourservice::all();
        return view('admin.ourservices.index',$data);
    }
    public function create_ourservices(){
        return view('admin.ourservices.create');
    }

    public function store_ourservices(Request $request){

        $this->validate($request, [
            'service_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_height=800',
            'service_title' => 'required|unique:ourservices|max:80',
            'description'  =>  'required',
        ],
        [
            'service_title'=> 'Service Title is required.',
            'service_title.unique'=> $request->service_title.' Service is already exists.',
            'service_title.max'=> 'Please Enter 80 Character of Service Title.',

            'service_image' => 'Service Image is required.',
            'service_image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
            'service_image.dimensions' => "Please Upload minimum 1800 X 800 Width and Height Image.",

            'description'  =>  'Description is required.',

        ]);
        $title          = $request->service_title;
        $slug           =  Str::slug($title);
        $imageName      =   time().'.'.$request->service_image->extension();
        $description    = $request->description;

        $image      =   Ourservice::create(["service_title" => $title ,"service_slug"=>$slug,"service_image" => $imageName,"description"=>$description]);

        if($image){
            $request->service_image->move(public_path('ourservice_image'), $imageName);
            $request->session()->flash('success', 'Our Services Add Successfully.');
            return redirect(route('ourservices'));
        }
    }

    public function edit_ourservices($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_service'] = Ourservice::where('id',$id)->first();
        return view('admin.ourservices.edit',$data);
    }

    public function update_ourservices(Request $request){
        $id          = $request->service_id;
        $title       =   $request->service_title;
        $slug        =  Str::slug($title);
        $description = $request->description;


        if($request->service_image == ""){
            $image      =   Ourservice::where('id',$id)->update(["service_title" => $title ,"service_slug"=>$slug,"service_image" =>$request->old_serviceimage,"description"=>$description]);
            if($image){

                $request->session()->flash('success', 'Our Service Update Successfully.');
                return redirect(route('ourservices'));
            }

        }else{

            $this->validate($request, [
                'service_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_height=800',
                'service_title' => 'required|max:80',
                'description'  =>  'required',
            ],
            [
                'service_title'=> 'Service Title is required.',
                'service_title.max'=> 'Please Enter 80 Character of Service Title.',

                'service_image' => 'Service Image is required.',
                'service_image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'service_image.dimensions' => "Please Upload minimum 1800 X 800 Width and Height Image.",

                'description'  =>  'Description is required.',

            ]);

            $imageName  =   time().'.'.$request->service_image->extension();
            $image      =   Ourservice::where('id',$id)->update(["service_title" => $title ,"service_slug"=>$slug,"service_image" =>$imageName,"description"=>$description]);
            if($image){
                $request->service_image->move(public_path('ourservice_image'), $imageName);
                $request->session()->flash('success', 'Our Service Update Successfully.');
                return redirect(route('ourservices'));
            }

        }

    }

    public function delete_ourservices(Request $request,$id){
        $id = CryptoCode::decrypt($id);
        $Exist_files = Ourservice::where('id',$id)->first();

        if( file_exists(public_path("ourservice_image/").$Exist_files->service_image)) {

           unlink(public_path("ourservice_image/").$Exist_files->service_image);
        }

        $slider = Ourservice::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'Our Service Delete Successfully.');
            return redirect(route('ourservices'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = Ourservice::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }

    }
}
