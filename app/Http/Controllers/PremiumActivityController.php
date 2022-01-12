<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumActivity;
use App\Helper\CryptoCode;
use Illuminate\Support\Str;

class PremiumActivityController extends Controller
{
    public function index()
    {
        $data['premium_activity'] = PremiumActivity::all();
        return view('admin.premium_activity.index', $data);
    }

    public function create_premium_activity()
    {
        return view('admin.premium_activity.create');
    }

    public function store_premium_activity(Request $request)
    {

        $this->validate(
            $request,
            [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=782,min_height=521,max_width=782,max_height=521',
                'premiumactivity_title' => 'required|unique:premiumactivities|max:80',
                'description' => 'required'
            ],
            [
                'premiumactivity_title' => 'Premium Activity Title is required.',
                'premiumactivity_title.unique' => $request->premiumactivity_title . ' Premium Activity is already exists.',
                'premiumactivity_title.max' => 'Please Enter 80 Character of Premium Activity Title.',

                'image' => 'Premium Activity Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload Maximum 782 X 521 .",

                'description' => 'Description is required.'

            ]
        );
        $title          =   $request->premiumactivity_title;
        $slug           =   Str::slug($title);
        $imageName      =   time() . '.' . $request->image->extension();
        $description    =   $request->description;

        $image      =   PremiumActivity::create(["premiumactivity_title" => $title, "premiumactivity_slug" => $slug, "image" => $imageName, "description" => $description]);

        if ($image) {
            $request->image->move(public_path('premiumactivity_image'), $imageName);
            $request->session()->flash('success', 'Premium Activity Add Successfully.');
            return redirect(route('premiumactivity'));
        }
    }

    public function edit_premium_activity($id)
    {
        $id =  CryptoCode::decrypt($id);
        $data['edit_premiumactivity'] = PremiumActivity::where('id', $id)->first();
        return view('admin.premium_activity.edit', $data);
    }

    public function update_premium_activity(Request $request)
    {
        $id             = $request->premiumactivity_id;
        $title          =   $request->premiumactivity_title;
        $slug           =   Str::slug($title);
        $description    =   $request->description;

        if ($request->image == "") {

            $this->validate(
                $request,
                [

                    'premiumactivity_title' => 'required|max:80',
                    'description' => 'required'
                ],
                [
                    'premiumactivity_title' => 'Premium Activity Title is required.',
                    'premiumactivity_title.unique' => $request->premiumactivity_title . ' Premium Activity is already exists.',
                    'premiumactivity_title.max' => 'Please Enter 80 Character of Premium Activity Title.',
                    'description' => 'Description is required.'

                ]
            );

            $image      =   PremiumActivity::where('id', $id)->update(["premiumactivity_title" => $title, "premiumactivity_slug" => $slug, "image" => $request->old_image]);
            if ($image) {

                $request->session()->flash('success', 'Premium Activity Update Successfully.');
                return redirect(route('premiumactivity'));
            }
        } else {


        $this->validate(
            $request,
            [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=782,min_height=521,max_width=782,max_height=521',
                'premiumactivity_title' => 'required|unique:premiumactivities|max:80',
                'description' => 'required'
            ],
            [
                'premiumactivity_title' => 'Premium Activity Title is required.',
                'premiumactivity_title.unique' => $request->premiumactivity_title . ' Premium Activity is already exists.',
                'premiumactivity_title.max' => 'Please Enter 80 Character of Premium Activity Title.',
                'image' => 'Premium Activity Image is required.',
                'image.max' => "Please Upload Maximum Image size to 2MB (2048 KB).",
                'image.dimensions' => "Please Upload Maximum 782 X 521 .",
                'description' => 'Description is required.'

            ]
        );

            $imageName  =   time() . '.' . $request->image->extension();
            $image      =   PremiumActivity::where('id', $id)->update(["premiumactivity_title" => $title, "premiumactivity_slug" => $slug, "image" => $imageName, "description" => $description]);
            if ($image) {
                $request->image->move(public_path('premiumactivity_image'), $imageName);
                $request->session()->flash('success', 'Premium Activity Update Successfully.');
                return redirect(route('premiumactivity'));
            }
        }
    }

    public function delete_premium_activity(Request $request, $id)
    {
        $id =  CryptoCode::decrypt($id);
        $Exist_files = PremiumActivity::where('id', $id)->first();

        if (file_exists(public_path("premiumactivity_image/") . $Exist_files->image)) {

            unlink(public_path("premiumactivity_image/") . $Exist_files->image);
        }

        $slider = PremiumActivity::find($id)->delete();
        if ($slider) {
            $request->session()->flash('success', 'Premium Activity Delete Successfully.');
            return redirect(route('premiumactivity'));
        }
    }

    public function change_status(Request $request)
    {
        $id             = $request->id;
        $status         = $request->status;
        $result          = PremiumActivity::where('id', $id)->update(["status" => $status]);
        if ($result) {
            $data["response"] = array("statuscode" => 200, "status" => true, "message" => "Success");
            echo json_encode($data);
            exit;
        } else {
            $data["response"] = array("statuscode" => 500, "status" => false, "message" => "Fail");
            echo json_encode($data);
            exit;
        }
    }
}
