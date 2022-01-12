<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\About_dubaicategory;
use App\Models\About_dubaisubcategory;
use App\Models\Local_restaurant;
use App\Models\Review;
use App\Models\Package;
use App\Models\SubPackage;
use App\Models\Ourservice;
use Illuminate\Support\Facades\Crypt;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $request->session()->forget('success');
            $request->session()->flash('success', 'Welcome '.Auth::user()->name);

            /** get Total Slider */
            $data['total_slider']       = Slider::all()->count();
            $data['total_category']     = About_dubaicategory::all()->count();
            $data['total_subcategory']  = About_dubaisubcategory::all()->count();
            $data['total_restaurant']   = Local_restaurant::all()->count();
            $data['total_review']       = Review::all()->count();
            $data['total_package']      = Package::all()->count();
            $data['total_subpackage']   = SubPackage::all()->count();
            $data['total_service']      = Ourservice::all()->count();

            return view('home',$data);
         }else{
             return  redirect('login');
        }
    }

    public function profile($id)
    {
        $id = Crypt::decrypt($id);
        return view('auth.profile');
    }
}
