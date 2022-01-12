<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;

class ReviewController extends Controller
{
    public function index(){
        $data['review'] = Review::all();
        return view('admin.reviews.index',$data);
    }

    public function create_reviews(){
        return view('admin.reviews.create');
    }

    public function store_reviews(Request $request){

        $this->validate($request, [
            'review_image' => 'required|image|mimes:jpeg,png,jpg|max:1024|dimensions:min_width=128,min_height=128',
            'name' => 'required|unique:reviews|max:80',
            'ratting' => 'required|numeric',
            'description'=>'required'
        ],
        [
            'name'=> 'Reivew Title is required.',
            'name.unique'=> $request->name.' Review Name is already exists.',
            'name.max'=> 'Please Enter 80 Character of Review Name.',

            'review_image' => 'Review Image is required.',
            'review_image.max' => "Please Upload Maximum Image size to 1MB (1024 KB).",
            'review_image.dimensions' => "Please Upload 128 X 128 Width and Height Image.",

            'ratting'=>'Ratting is required.',
            'ratting.numeric'=>'Please enter only number in Ratting.',

            'description'=>"Description is required."

        ]);
        $name       = $request->name;
        $ratting    = $request->ratting;
        $imageName  =   time().'.'.$request->review_image->extension();
        $description = $request->description;

        $image      =   Review::create(["name" => $name ,"review_image" => $imageName,"ratting"=>$ratting,"description"=>$description]);
        if($image){
            $request->review_image->move(public_path('review_image'), $imageName);
            $request->session()->flash('success', 'Reviews Add Successfully.');
            return redirect(route('reviews'));
        }
    }

    public function edit_reviews($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_review'] = Review::where('id',$id)->first();
        return view('admin.reviews.edit',$data);
    }

    public function update_reviews(Request $request){
        $id         = $request->review_id;
        $name       = $request->name;
        $ratting    = $request->ratting;
        $description = $request->description;

        if($request->review_image == ""){
            $image      =   Review::where('id',$id)->update(["name" => $name ,"review_image" => $request->old_review_image,"ratting"=>$ratting,"description"=>$description]);
            if($image){

                $request->session()->flash('success', 'Reviews Category Update Successfully.');
                return redirect(route('reviews'));
            }

        }else{

            $this->validate($request, [
                'review_image' => 'required|image|mimes:jpeg,png,jpg|max:1024|dimensions:min_width=128,min_height=128',
                'name' => 'required|unique:reviews|max:80',
                'ratting' => 'required|numeric',
                'description'=>'required'
            ],
            [
                'name'=> 'Reivew Title is required.',
                'name.unique'=> $request->name.' Review Name is already exists.',
                'name.max'=> 'Please Enter 80 Character of Review Name.',

                'review_image' => 'Review Image is required.',
                'review_image.max' => "Please Upload Maximum Image size to 1MB (1024 KB).",
                'review_image.dimensions' => "Please Upload minimum 128 X 128 Width and Height Image.",

                'ratting'=>'Ratting is required.',
                'ratting.numeric'=>'Please enter only number in Ratting.',

                'description'=>"Description is required."

            ]);

            $imageName  =   time().'.'.$request->review_image->extension();
            $image      =   Review::where('id',$id)->update(["name" => $name ,"review_image" => $request->$imageName,"ratting"=>$ratting,"description"=>$description]);
            if($image){
                $request->image->move(public_path('review_image'), $imageName);
                $request->session()->flash('success', 'Reviews Update Successfully.');
                return redirect(route('reviews'));
            }
        }
    }

    public function delete_reviews(Request $request,$id){
        $id = CryptoCode::decrypt($id);
        $Exist_files = Review::where('id',$id)->first();

        if( file_exists(public_path("review_image/").$Exist_files->review_image)) {

           unlink(public_path("review_image/").$Exist_files->review_image);
        }

        $slider = Review::find($id)->delete();
        if($slider){
            $request->session()->flash('success', 'Reviews Delete Successfully.');
            return redirect(route('reviews'));
        }
    }

    public function change_status(Request $request){
        $id             = $request->id;
        $status         = $request->status;
        $result          = Review::where('id',$id)->update(["status"=>$status]);
       if($result){
            $data["response"] = array("statuscode"=>200,"status"=>true,"message"=>"Success");
            echo json_encode($data);exit;
       }else{
            $data["response"] = array("statuscode"=>500,"status"=>false,"message"=>"Fail");
            echo json_encode($data);exit;
       }

    }
}
