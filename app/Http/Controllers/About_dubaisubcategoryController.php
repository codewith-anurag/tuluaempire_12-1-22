<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About_dubaisubcategory;
use App\Models\About_dubaicategory;
use App\Models\Local_restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;

class About_dubaisubcategoryController extends Controller
{
    public function index(){

        $data['subcategory'] = DB::table('about_dubaisubcategories')
            ->join('about_dubaicategories', 'about_dubaisubcategories.category_id', '=', 'about_dubaicategories.id')
            ->select('about_dubaisubcategories.*', 'about_dubaicategories.title as category_title')
            ->get();
        return view('admin.aboutdubai_subcategory.index',$data);
    }

    public function create_subcategory(){
        $data['category'] = About_dubaicategory::where("status",'1')->get();
        return view('admin.aboutdubai_subcategory.create',$data);
    }

    public function store_subcategory(Request $request){

        $this->validate($request, [
            'category' => 'required',
            'template' => 'required',
        ],
        [
            'category' => 'Category is required.',
            'template' => 'Template is required.',
        ]);
        $categorydata = About_dubaicategory::where("id",$request->category)->first();
        if($request->template == "simple"){

            $this->validate($request, [

                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_width=800',
                'title' => 'required|unique:about_dubaisubcategories|max:80',
                'description' => 'required'
            ],
            [
                'title'=> 'Sub Category Title is required.',
                'title.unique'=> $request->title.' Category is already exists.',
                'title.max'=> 'Please Enter 80 Character of Category Title.',
                'image' => 'Sub Category Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload minimum 1800 X 800 Width and Height Image.",
                'description' => "Description is required"

            ]);

            $title          =     $request->title;
            $category       =     $request->category;
            $template_type  =     $request->template;
            $slug           =     $categorydata->category_slug;
            $imageName      =     time().'.'.$request->image->extension();
            $description    =     $request->description;

            $subcategory    =   About_dubaisubcategory::create(["category_id"=>$category,"template_type"=>$template_type,"title" => $title ,"category_slug"=>$slug,"subcategory_image" => $imageName,"description"=>$description]);

            if($subcategory){
                $request->image->move(public_path('subcategory_image'), $imageName);
                $request->session()->flash('success', 'About Dubai SubCategory Add Successfully.');
                return redirect(route('about-dubai-subcategory'));
            }


        }else if($request->template == "localresturant"){

            $this->validate($request, [

                'resturant_image' => 'required|image|mimes:jpeg,png,jpg|max:20000|dimensions:min_width=6000,min_width=6000',
                'resturant_title' => 'required|unique:local_restaurants|max:80',
                'resturant_arabic_title' => 'required|unique:local_restaurants|max:80',
                'resturant_food_type'=>'required',
                'resturant_ratting'=>'required',
                'resturant_speciality'=>'required|max:80',
                'resturant_area'=>'required|max:80',
                'resturant_avg_cost_pp'=>'required|numeric|max:80',
                'resturant_lunch_or_dinner'=>'required'

            ],
            [
                'resturant_title'=> 'Resturant Title is required.',
                'resturant_title.unique'=> $request->title.' Resturant is already exists.',
                'resturant_title.max'=> 'Please Enter 80 Character of Resturant Title.',

                'resturant_arabic_title'=> 'Resturant Arabic Title is required.',
                'resturant_arabic_title.unique'=> $request->title.' Resturant is already exists.',
                'resturant_arabic_title.max'=> 'Please Enter 80 Character of Resturant Arabic Title.',

                'resturant_image' => 'Resturant Image is required.',
                'resturant_image.max' => "Please Upload Maximum Image size to 20MB (20000 KB).",
                'resturant_image.dimensions' => "Please Upload minimum 6000 X 6000 Width and Height Image.",

                'resturant_food_type'=>'Food Type is required.',
                'resturant_ratting'=>'Ratting is required.',

                'resturant_speciality'=>'Speciality is required.',
                'resturant_speciality.max'=> 'Please Enter 80 Character of Resturant Speciality.',

                'resturant_area'=>'Resturant Area is required.',
                'resturant_area.max'=>'Please Enter 80 Character of Resturant Area.',

                'resturant_avg_cost_pp'=>'Resturant Avg Cost pp is required.',
                'resturant_avg_cost_pp.numeric'=>'Please Enter only number in Resturant Avrage Cost PP.',
                'resturant_avg_cost_pp.max'=>'Please Enter 80 Character of Resturant Avrage Cost PP.',

                'resturant_lunch_or_dinner'=>'Lunch/Dinner is required.'



            ]);
            $resturant_title          =     $request->resturant_title;
            $resturant_arabic_title   =     $request->resturant_arabic_title;
            $category                 =     $request->category;
            $template_type            =     $request->template;
            $slug                     =     $categorydata->category_slug;
            $imageName                =     time().'.'.$request->resturant_image->extension();
            $resturant_food_type      =     $request->resturant_food_type;
            $resturant_ratting        =     $request->resturant_ratting;
            $resturant_speciality     =     $request->resturant_speciality;
            $resturant_area           =     $request->resturant_area;
            $resturant_avg_cost_pp    =     $request->resturant_avg_cost_pp;
            $resturant_lunch_or_dinner = $_POST['resturant_lunch_or_dinner'];

            $resturant_lunch_or_dinner =    implode('/',$resturant_lunch_or_dinner);

            $resturant      =   Local_restaurant::create(["category_id"=>$category,"category_slug"=>$slug,"template_type"=>$template_type,"resturant_title" => $resturant_title ,"resturant_arabic_title"=>$resturant_arabic_title ,"resturant_image" => $imageName,"resturant_food_type"=>$resturant_food_type,"resturant_ratting"=>$resturant_ratting,"resturant_speciality"=>$resturant_speciality,"resturant_area"=>$resturant_area,"resturant_avg_cost_pp"=>$resturant_avg_cost_pp,"resturant_lunch_or_dinner"=>$resturant_lunch_or_dinner]);

            if($resturant){
                $request->resturant_image->move(public_path('resturant_image'), $imageName);
                $request->session()->flash('success', 'About Dubai Local Restaurants Add Successfully.');
                return redirect(route('local-restaurants'));
            }
        }
    }

    public function edit_subcategory($id){
        $id =  CryptoCode::decrypt($id);
        $data['category'] = About_dubaicategory::where("status",'1')->get();
        $data['edit_subcategory'] = About_dubaisubcategory::where('id',$id)->first();
        return view('admin.aboutdubai_subcategory.edit',$data);
    }

    public function update_subcategory(Request $request){
        $categorydata = About_dubaicategory::where("id",$request->category)->first();

        $id           =     $request->subcategory_id;
        $category     =     $request->category;
        $title        =     $request->title;
        $slug         =     $categorydata->category_slug;
        $description  =     $request->description;

        if($request->image == ""){
            $image      =   About_dubaisubcategory::where('id',$id)->update(["category_id"=>$category,"title"=>$title,"category_slug"=>$slug,"subcategory_image" =>$request->old_image,"description"=>$description]);
            if($image){
                $request->session()->flash('success', 'About Dubai SubCategory Update Successfully.');
                return redirect(route('about-dubai-subcategory'));
            }
        }else{
            $this->validate($request, [
                'category' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=1800,min_height=800,max_width=1800,max_height=800',
                'title' => 'required|unique:about_dubaicategories|max:80'
            ],
            [
                'category' => 'Category is required',
                'title'=> 'Sub Category Title is required.',
                'title.unique'=> $request->title.' Sub Category is already exists.',
                'title.max'=> 'Please Enter 80 Character of Category Title.',
                'image' => 'Sub Category Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload minimum 1800 X 800 Width and Height Image."

            ]);
            $imageName  =   time().'.'.$request->image->extension();
            $image      =   About_dubaisubcategory::where('id',$id)->update(["category_id"=>$category,"title"=>$title,"category_slug"=>$slug,"subcategory_image" => $imageName,"description"=>$description]);
            if($image){
                $request->image->move(public_path('subcategory_image'), $imageName);
                $request->session()->flash('success', 'About Dubai SubCategory Update Successfully.');
                return redirect(route('about-dubai-subcategory'));
            }
        }
    }

    public function delete_subcategory(Request $request,$id){
        $id =  CryptoCode::decrypt($id);
        $Exist_files = About_dubaisubcategory::where('id',$id)->first();

        if( file_exists(public_path("subcategory_image/").$Exist_files->subcategory_image)) {

           unlink(public_path("subcategory_image/").$Exist_files->subcategory_image);
        }

        $slider = About_dubaisubcategory::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'About Dubai SubCategory Delete Successfully.');
            return redirect(route('about-dubai-subcategory'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = About_dubaisubcategory::where('id',$id)->update(["status"=>$status]);
        if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }
    }
}
