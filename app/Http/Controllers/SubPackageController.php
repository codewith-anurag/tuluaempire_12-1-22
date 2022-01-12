<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubPackage;
use App\Models\Package;
use App\Models\SubPackageSlider;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubPackageController extends Controller
{
    public function index($package_id="")
    {

        $package_id = CryptoCode::decrypt($package_id);
        Session::put('package_id', $package_id);
        

        $Package = new SubPackage();
        $data['subpackage'] = SubPackage::where('package_id',$package_id)->get();
        $packageData = $Package->get_package($package_id);
        //dd($packageData);
        $data['package'] = $packageData['package_title'];

        return view('admin.subpackge.index',$data);
    }

    public function create_subpackages()
    {
        $encryptedValue = request()->segment(count(request()->segments()));
        $data['package_id'] = CryptoCode::decrypt($encryptedValue);
        return view('admin.subpackge.create',$data);
    }
    public function store_subpackages(Request $request){
        //dd($request);
        $this->validate($request, [

            'subpackage_title' => 'required|unique:subpackages|max:80',
            'description'=> 'required',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'

        ],
        [
            'subpackage_title'=> 'Sub Package  Title is required.',
            'subpackage_title.unique'=> $request->subpackage_title.' Sub Package is already exists.',
            'subpackage_title.max'=> 'Please Enter 80 Character of Sub Package Title.',
            'description'=>'Description is required.',
            'imageFile' => 'Sub Package Image is required.',
            'imageFile.mimes' => 'Sub Package Image Type only PNG , JPG .',
            'imageFile.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",


        ]);
        $package_id        = $request->package_id;

        $packge_data       = Package::where('id',$package_id)->first();
        $packge_slug       = $packge_data->packge_slug;

        $subpackage_title  = $request->subpackage_title;
        $slug              =  Str::slug($subpackage_title);
        $description       = $request->description;

        $subpackage_id      =   SubPackage::create(["package_id"=>$request->package_id,"packge_slug"=>$packge_slug,"subpackage_title" => $subpackage_title ,"subpackge_slug"=>$slug,"description"=>$description])->id;

        if($subpackage_id){
                //dd($_FILES['imageFile']);
            $subpackage_image = $request->file('imageFile');
            if($subpackage_image){
                foreach($subpackage_image as $file){
                    $fileLink = rand(9999,999999);
                    $filename = $fileLink.'_'.time().'.'. $file->getClientOriginalExtension();

                    $file->move(public_path().'/subpackage_slider_image/',$filename);
                    SubPackageSlider::create(['subpackage_id'=>$subpackage_id,'subpackage_slug'=>$slug,'image'=>$filename]);
                }
            }else{

            }
            $request->session()->flash('success', 'Sub Package Add Successfully.');
            return redirect(route('subpackages',CryptoCode::encrypt($package_id)));
        }
    }

    public function edit_subpackages($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_subpackages'] = SubPackage::where('id',$id)->first();
        return view('admin.subpackge.edit',$data);
    }

    public function update_subpackages(Request $request){
        $id         = $request->subpackage_id;
        $package_id = $request->package_id;
        $this->validate($request, [
            'subpackage_title' => 'required|max:80',
            'description'=>'required'
        ],
        [
            'subpackage_title'=> 'Package  Title is required.',
            'subpackage_title.max'=> 'Please Enter 80 Character of Package Title.',
            'description'=>'Description is required.'

        ]);
        $subpackage_title   = $request->subpackage_title;
        $slug              =  Str::slug($subpackage_title);
        $description        = $request->description;

        $subpackge_Data = SubPackage::where('id',$id)->first();
        $packge_Data = Package::where('id',$subpackge_Data->package_id)->first();


        $image      =   SubPackage::where('id',$id)->update(["packge_slug"=>$packge_Data->packge_slug,"subpackage_title" => $subpackage_title ,"subpackge_slug"=>$slug,"description"=>$description]);
        if($image){

            $request->session()->flash('success', 'Sub Package Update Successfully.');
            return redirect(route('subpackages',$package_id));
        }

    }

    public function delete_subpackages(Request $request,$id,$package_id){
        $id = CryptoCode::decrypt($id);

        $getsubpackage_slider =  SubPackageSlider::where('subpackage_id',$id)->first();
        if(empty($getsubpackage_slider)){
            $Exist_files = SubPackageSlider::where('subpackage_id',$id)->first();
            if( file_exists(public_path("subpackage_slider_image/").$Exist_files->image)) {
                unlink(public_path("subpackage_slider_image/").$Exist_files->image);
            }
            $subpakage = SubPackage::find($id)->delete();
            if($subpakage){
                $request->session()->flash('success', 'Sub Package Delete Successfully.');
                return redirect(route('subpackages',$package_id));
            }

        }else{
            $request->session()->flash('success', 'Please First Delete Sub Packages Slider All Images.');
            return redirect(route('subpackages',$package_id));
        }


    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = SubPackage::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }

    }
}
