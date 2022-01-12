<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local_restaurant;
use App\Models\About_dubaicategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;

class Local_restaurantController extends Controller
{
    public function index(){

        $data['restaurants'] = DB::table('local_restaurants')
            ->join('about_dubaicategories', 'local_restaurants.category_id', '=', 'about_dubaicategories.id')
            ->select('local_restaurants.*', 'about_dubaicategories.title as category_title')
            ->get();
        
        return view('admin.restaurant.index',$data);
    }
    public function edit_restaurant($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_restaurant'] = Local_restaurant::where('id',$id)->first();
        return view('admin.restaurant.edit',$data);
    }

    public function update_restaurant(Request $request){

        $id =  $request->resturant_id;
        if($request->resturant_image == ""){
            $resturant_title            =     $request->resturant_title;
            $resturant_arabic_title     =     $request->resturant_arabic_title;
            $resturant_food_type        =     $request->resturant_food_type;
            $resturant_ratting          =     $request->resturant_ratting;
            $resturant_speciality       =     $request->resturant_speciality;
            $resturant_area             =      $request->resturant_area;
            $resturant_avg_cost_pp      =     $request->resturant_avg_cost_pp;
            $resturant_lunch_or_dinner  = $_POST['resturant_lunch_or_dinner'];
            $resturant_lunch_or_dinner =    implode('/',$resturant_lunch_or_dinner);

            $resturant_data = Local_restaurant::where('id',$id)->first();
            $category_data  = About_dubaicategory::where('id',$resturant_data->category_id)->first();

            $image      =   Local_restaurant::where('id',$id)->update(["category_slug"=>$category_data->category_slug,"resturant_title"=>$resturant_title,"resturant_arabic_title"=>$resturant_arabic_title,
            "resturant_image" =>$request->resturant_oldimage,"resturant_food_type"=>$resturant_food_type,"resturant_ratting"=>$resturant_ratting,"resturant_speciality"=>$resturant_speciality,"resturant_area"=>$resturant_area,"resturant_avg_cost_pp"=>$resturant_avg_cost_pp,"resturant_lunch_or_dinner"=>$resturant_lunch_or_dinner]);
            if($image){
                $request->session()->flash('success', 'Restaurant Update Successfully.');
                return redirect(route('local-restaurants'));
            }
        }else{
            $this->validate($request, [

                'resturant_image' => 'required|image|mimes:jpeg,png,jpg|max:20000|dimensions:min_width=6000,min_width=6000',
                'resturant_title' => 'required|max:80',
                'resturant_arabic_title' => 'required|max:80',
                'resturant_food_type'=>'required',
                'resturant_ratting'=>'required',
                'resturant_speciality'=>'required|max:80',
                'resturant_area'=>'required|max:80',
                'resturant_avg_cost_pp'=>'required|numeric|max:80',
                'resturant_lunch_or_dinner'=>'required',
                //'description' => 'required'
            ],
            [
                'resturant_title'=> 'Resturant Title is required.',
                //'resturant_title.unique'=> $request->resturant_title.' Resturant is already exists.',
                'resturant_title.max'=> 'Please Enter 80 Character of Resturant Title.',

                'resturant_arabic_title'=> 'Resturant Arabic Title is required.',
                //'resturant_arabic_title.unique'=> $request->resturant_arabic_title.' Resturant is already exists.',
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

                'resturant_lunch_or_dinner'=>'Lunch/Dinner is required.',

            ]);
            $resturant_title          =     $request->resturant_title;
            $resturant_arabic_title   =     $request->resturant_arabic_title;
            $imageName                =     time().'.'.$request->resturant_image->extension();
            $resturant_food_type      =     $request->resturant_food_type;
            $resturant_ratting        =     $request->resturant_ratting;
            $resturant_speciality     =     $request->resturant_speciality;
            $resturant_area           =     $request->resturant_area;
            $resturant_avg_cost_pp    =     $request->resturant_avg_cost_pp;
            $resturant_lunch_or_dinner = $_POST['resturant_lunch_or_dinner'];
            $resturant_lunch_or_dinner =    implode('/',$resturant_lunch_or_dinner);

            $imageName  =   time().'.'.$request->resturant_image->extension();

            $resturant_data = Local_restaurant::where('id',$id)->first();
            $category_data  = About_dubaicategory::where('id',$resturant_data->category_id)->first();

            $image      =   Local_restaurant::where('id',$id)->update(["category_slug"=>$category_data->category_slug,"resturant_title"=>$resturant_title,"resturant_arabic_title"=>$resturant_arabic_title,
            "resturant_image" =>$imageName,"resturant_food_type"=>$resturant_food_type,"resturant_ratting"=>$resturant_ratting,"resturant_speciality"=>$resturant_speciality,"resturant_area"=>$resturant_area,"resturant_avg_cost_pp"=>$resturant_avg_cost_pp,"resturant_lunch_or_dinner"=>$resturant_lunch_or_dinner]);
            if($image){
                $request->resturant_image->move(public_path('resturant_image'), $imageName);
                $request->session()->flash('success', 'Restaurant Update Successfully.');
                return redirect(route('local-restaurants'));
            }
        }
    }

    public function delete_restaurant(Request $request,$id){
        $id = CryptoCode::decrypt($id);
        $Exist_files = Local_restaurant::where('id',$id)->first();

        if( file_exists(public_path("resturant_image/").$Exist_files->resturant_image)) {

           unlink(public_path("resturant_image/").$Exist_files->resturant_image);
        }

        $slider = Local_restaurant::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'Restaurant Delete Successfully.');
            return redirect(route('local-restaurants'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = Local_restaurant::where('id',$id)->update(["status"=>$status]);
        if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }
    }
}
