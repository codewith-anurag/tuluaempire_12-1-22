<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\SubPackage;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $data['package'] = Package::all();
        return view('admin.packge.index',$data);
    }

    public function create_packages()
    {
        return view('admin.packge.create');
    }
    public function store_packages(Request $request){
        //dd($request);
        $this->validate($request, [

            'package_title' => 'required|unique:packages|max:80',
            'tour_overview[]'=>'required_array',
            'tour_highligts'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required'

        ],
        [
            'package_title'=> 'Package  Title is required.',
            'package_title.unique'=> $request->package_title.' Package is already exists.',
            'package_title.max'=> 'Please Enter 80 Character of Package Title.',
            'tour_overview[]'=>'Tour Overview is required.',
            'tour_highligts'=>'Tour Hightligts is required.',
            'inclusion'=>'Inclusion is required.',
            'exclusion'=>'Exclusion is required.',

        ]);
        $package_title     = $request->package_title;
        $slug              =  Str::slug($package_title);
        $tour_overview     = $_POST["tour_overview"];
        $tour_overview     = implode(",",$tour_overview);
        $tour_highligts    = $request->tour_highligts;
        $inclusion         = $request->inclusion;
        $exclusion         = $request->exclusion;

        $image      =   Package::create(["package_title" => $package_title ,"packge_slug"=>$slug,"tour_overview"=>$tour_overview,"tour_highligts"=>$tour_highligts,"inclusion"=>$inclusion,"exclusion"=>$exclusion]);

        if($image){

            $request->session()->flash('success', 'Package Add Successfully.');
            return redirect(route('packages'));
        }
    }

    public function edit_packages($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_packages'] = Package::where('id',$id)->first();
        return view('admin.packge.edit',$data);
    }

    public function update_packages(Request $request){
        $id         = $request->package_id;
        $this->validate($request, [

            'package_title' => 'required|max:80',
            'tour_overview[]'=>'required_array',
            'tour_highligts'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required'

        ],
        [
            'package_title'=> 'Package  Title is required.',
            'package_title.max'=> 'Please Enter 80 Character of Package Title.',
            'tour_overview[]'=>'Tour Overview is required.',
            'tour_highligts'=>'Tour Hightligts is required.',
            'inclusion'=>'Inclusion is required.',
            'exclusion'=>'Exclusion is required.',

        ]);
        $package_title     = $request->package_title;
        $slug              =  Str::slug($package_title);
        $tour_overview     = $_POST["tour_overview"];
        $tour_overview     = implode(",",$tour_overview);
        $tour_highligts    = $request->tour_highligts;
        $inclusion         = $request->inclusion;
        $exclusion         = $request->exclusion;

        $image      =   Package::where('id',$id)->update(["package_title" => $package_title ,"packge_slug"=>$slug,"tour_overview"=>$tour_overview,"tour_highligts"=>$tour_highligts,"inclusion"=>$inclusion,"exclusion"=>$exclusion]);
        if($image){

            $request->session()->flash('success', 'Package Update Successfully.');
            return redirect(route('packages'));
        }

    }

    public function delete_packages(Request $request,$id){
        $id = CryptoCode::decrypt($id);
        $get_subpackge = SubPackage::where("package_id",$id)->first();

        if(empty($get_subpackge)){
            $slider = Package::find($id)->delete();
            if($slider){

                $request->session()->flash('success', 'Package Delete Successfully.');
                return redirect(route('packages'));
            }
        }else{
            $request->session()->flash('success', 'Please First Delete Sub Packages.');
            return redirect(route('packages'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = Package::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }

    }
}
