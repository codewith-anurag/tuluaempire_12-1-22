<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About_dubaicategory;
use App\Models\About_dubaisubcategory;
use App\Models\Local_restaurant;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;
use Illuminate\Support\Str;

class About_dubaicategoryController extends Controller
{
    public function index(){
        $data['category'] = About_dubaicategory::all();
        return view('admin.aboutdubai_category.index',$data);
    }

    public function create_category(){
        return view('admin.aboutdubai_category.create');
    }

    public function store_category(Request $request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=360,min_height=251',
            'title' => 'required|unique:about_dubaicategories|max:80'
        ],
        [
            'title'=> 'Category Title is required.',
            'title.unique'=> $request->title.' Category is already exists.',
            'title.max'=> 'Please Enter 80 Character of Category Title.',
            'image' => 'Category Image is required.',
            'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
            'image.dimensions' => "Please Upload minimum 360 X 251 Width and Height Image."

        ]);
        $title      =  $request->title;
        $slug       =   $slug = Str::slug($request->title);
        $imageName  =   time().'.'.$request->image->extension();
        $image      =   About_dubaicategory::create(["title" => $title ,"category_slug"=>$slug,"category_image" => $imageName]);

        if($image){
            $request->image->move(public_path('category_image'), $imageName);
            $request->session()->flash('success', 'About Dubai Category Add Successfully.');
            return redirect(route('about-dubai-category'));
        }
    }

    public function edit_category($id){
        $id =  CryptoCode::decrypt($id);
        $data['edit_category'] = About_dubaicategory::where('id',$id)->first();
        return view('admin.aboutdubai_category.edit',$data);
    }

    public function update_category(Request $request){
        $id       = $request->category_id;
        $title    =   $request->title;
        $slug     =   $slug = Str::slug($request->title);

        if($request->image == ""){
            $image      =   About_dubaicategory::where('id',$id)->update(["title"=>$title,"category_slug"=>$slug,"category_image" =>$request->old_image]);
            if($image){

                $request->session()->flash('success', 'About Dubai Category Update Successfully.');
                return redirect(route('about-dubai-category'));
            }

        }else{

            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=360,min_height=251',
                'title' => 'required|unique:about_dubaicategories|max:80'
            ],
            [
                'title'=> 'Category Title is required.',
                'title.unique'=> $request->title.' Category is already exists.',
                'title.max'=> 'Please Enter 80 Character of Category Title.',
                'image' => 'Category Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload minimum 360 X 251 Width and Height Image."

            ]);

            $imageName  =   time().'.'.$request->image->extension();
            $image      =   About_dubaicategory::where('id',$id)->update(["title"=>$title,"category_slug"=>$slug,"category_image" => $imageName]);
            if($image){
                $request->image->move(public_path('category_image'), $imageName);
                $request->session()->flash('success', 'About Dubai Category Update Successfully.');
                return redirect(route('about-dubai-category'));
            }
        }
    }

    public function delete_category(Request $request,$id){
        $id =  CryptoCode::decrypt($id);
        $Exist_files = About_dubaicategory::where('id',$id)->first();

        $get_subcategory  = About_dubaisubcategory::where('category_id',$id)->first();
        $get_location     = Local_restaurant::where('category_id',$id)->first();

        if(!empty($get_subcategory)){
            if($get_subcategory->template_type == "simple"){
                if(empty($get_subcategory)){
                    if( file_exists(public_path("category_image/").$Exist_files->category_image)) {

                        unlink(public_path("category_image/").$Exist_files->category_image);
                    }
                    $slider = About_dubaicategory::find($id)->delete();
                    if($slider){
                        $request->session()->flash('success', 'About Dubai Category Delete Successfully.');
                        return redirect(route('about-dubai-category'));
                    }

                }else{
                    $request->session()->flash('success', 'Please First Delete About Dubai Sub Category.');
                    return redirect(route('about-dubai-category'));
                }
            }
        }elseif(!empty($get_location)){
            if ($get_location->template_type == "localresturant") {
                if(empty($get_location)){
                    if( file_exists(public_path("category_image/").$Exist_files->category_image)) {

                        unlink(public_path("category_image/").$Exist_files->category_image);
                    }
                    $slider = About_dubaicategory::find($id)->delete();
                    if($slider){
                        $request->session()->flash('success', 'About Dubai Category Delete Successfully.');
                        return redirect(route('about-dubai-category'));
                    }
                }else{
                    $request->session()->flash('success', 'Please First Delete Restaurant.');
                    return redirect(route('about-dubai-category'));
                }
            }
        }else{

            if( file_exists(public_path("category_image/").$Exist_files->category_image)) {

                unlink(public_path("category_image/").$Exist_files->category_image);
            }
            $slider = About_dubaicategory::find($id)->delete();
            if($slider){
                $request->session()->flash('success', 'About Dubai Category Delete Successfully.');
                return redirect(route('about-dubai-category'));
            }
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = About_dubaicategory::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }

    }
}
