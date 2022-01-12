<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubPackageSlider;
use Illuminate\Support\Facades\Crypt;
use App\Models\SubPackage;
use App\Helper\CryptoCode;

class SubPackageSliderController extends Controller
{
    public function index($subpackge_ID)
    {
        $subpackge_ID = CryptoCode::decrypt($subpackge_ID);
        $SubPackage = new SubPackageSlider();
        $data['subpackage_slider'] = SubPackageSlider::where('subpackage_id',$subpackge_ID)->get();
        $SubpackageData = $SubPackage->get_subpackage($subpackge_ID);
        $data['subpackage'] = $SubpackageData['subpackage_title'];
        $data['subpackge_ID'] = $subpackge_ID;

        return view('admin.subpackge_slider.index',$data);
    }

    public function create_subpackages_slider($subpackge_ID){
        $data['subpackge_ID'] = CryptoCode::decrypt($subpackge_ID);
        return view('admin.subpackge_slider.create',$data);
    }

    public function store_subpackages_slider(Request $request)
    {
        $this->validate($request, [
            'imageFile' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=500,min_height=334',
        ],
        [
            'imageFile' => 'Sub Package Slider Image is required.',
            'imageFile.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
            'imageFile.dimensions' => "Please Upload minimum 500 X 334 Width and Height Image."

        ]);
        $subpackage_image = $request->file('imageFile');
        $subpackage_id    = $request->subpackage_id;
        $subpackage_slug  =  SubPackage::where('id',$subpackage_id)->first();

        if($subpackage_image){
            foreach($subpackage_image as $file){
                $fileLink = rand(9999,999999);
                $filename = $fileLink.'_'.time().'.'. $file->getClientOriginalExtension();

                $file->move(public_path().'/subpackage_slider_image/',$filename);
                SubPackageSlider::create(['subpackage_id'=>$subpackage_id,'subpackage_slug'=>$subpackage_slug['subpackge_slug'],'image'=>$filename]);
            }
        }else{

        }
        $request->session()->flash('success', 'Sub Package Add Successfully.');
        return redirect(route('subpackages-slider',CryptoCode::encrypt($subpackage_id)));
    }

    public function edit_subpackages_slider($id)
    {
        $id = CryptoCode::decrypt($id);

        $data['edit_subpackages_slider'] = SubPackageSlider::where("id",$id)->first();       
        return view('admin.subpackge_slider.edit',$data);

    }


    public function update_subpackages_slider(Request $request){
        $id         = $request->subpackage_slider_id;
        $subpackage_id = CryptoCode::encrypt($request->subpackage_id);
        $this->validate($request, [
            'imageFile' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=500,min_height=334',
        ],
        [
            'imageFile' => 'Sub Package Slider Image is required.',
            'imageFile.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
            'imageFile.dimensions' => "Please Upload minimum 500 X 334 Width and Height Image."

        ]);
        $imageName  =   time().'.'.$request->imageFile->extension();
        $image      =   SubPackageSlider::where('id',$id)->update(["image" => $imageName]);
        if($image){
            $request->imageFile->move(public_path('subpackage_slider_image'), $imageName);
            $request->session()->flash('success', 'Sub Package Slider Update Successfully.');
            return redirect(route('subpackages-slider',$subpackage_id));
        }

    }


    public function delete_subpackages_slider(Request $request,$id,$subpackage_id)
    {
        $id = CryptoCode::decrypt($id);

        $Exist_files = SubPackageSlider::where('id',$id)->first();
        if( file_exists(public_path("subpackage_slider_image/").$Exist_files->image)) {
           unlink(public_path("subpackage_slider_image/").$Exist_files->image);
        }
        $slider = SubPackageSlider::find($id)->delete();
        if($slider){

            $request->session()->flash('success', 'Sub Package Slider Image Delete Successfully.');
            return redirect(route('subpackages-slider',$subpackage_id));
        }
    }
}
