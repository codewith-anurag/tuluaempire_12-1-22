<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Review;
use App\Models\About_dubaicategory;
use App\Models\About_dubaisubcategory;
use App\Models\Local_restaurant;
use App\Models\Ourservice;
use App\Models\PremiumActivity;
use App\Models\SubTheme;
use App\Models\Inquiry;
use App\Models\Theme;
use App\Models\Package;
use App\Models\SubPackage;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\ContactSetting;
use App\Helper\CryptoCode;

class FrontController extends Controller
{
    public function index(){
        $data['slider']         =   Slider::where('status',1)->get();
        $data['review']         =   Review::where('status',1)->get();

        $data['aboutdubai']    =    About_dubaicategory::where('status',1)->get();
        return view('front.index',$data);
    }

    public function aboutdubai_subcategory($slug)
    {

        $subcategory_data                     = About_dubaisubcategory::where('status',1)->where('category_slug',$slug)->get();
        $data['subcategory']                  = $subcategory_data;
        $localresturant_data                  = Local_restaurant::where('status',1)->where('category_slug',$slug)->get();
        $resturantdata['localresturant_data'] = Local_restaurant::where('status',1)->where('category_slug',$slug)->get();

        if($subcategory_data->count() > 0){
            foreach($subcategory_data as $subcate) {
                if($subcate->template_type == "simple"){
                    $categorydata   =  DB::table('about_dubaicategories')->where('category_slug', $slug)->where('status',1)->first();
                    $data['category_title'] = !empty($categorydata) ? $categorydata->title : "";
                    return view('front.aboutdubaisubcategory',$data);

                }
            }
        }elseif($localresturant_data->count() > 0){
            foreach($localresturant_data as $resturant) {
                if($resturant->template_type == "localresturant"){
                    $categorydata   =  DB::table('about_dubaicategories')->where('category_slug', $slug)->first();
                    $resturantdata['category_title'] =  !empty($categorydata) ? $categorydata->title : '';
                    return view('front.localresturant',$resturantdata);
                }
            }
        }else{
            $resturantdata['title'] = "No Data Found.";
            return view('front.nodatafound',$resturantdata);
        }
    }

    public function about(){
        return view('front.about_us');
    }
    public function contact(){
        $data['contact_detail'] = ContactSetting::all();
        return view('front.contact_us',$data);
    }
    public function ourservices(){
        $data['ourservices'] = Ourservice::where('status',1)->get();
        return view('front.our_services',$data);
    }
    public function premium_activity(){
        $data['premium_activity'] = PremiumActivity::where('status',1)->get();
        return view('front.premium_activity',$data);
    }
    public function themes_detail($slug=""){
        if($slug !=""){
            $data['subtheme_id'] = $slug;
            $Subtheme = SubTheme::where('subtheme_slug',$data['subtheme_id'])->where('status',1)->first();


            $themeData =  DB::table('themes')->where('id', $Subtheme->theme_id)->first();
            $data['theme_title'] = $themeData->title;

            $data['subthemes'] = SubTheme::where('theme_id',$Subtheme->theme_id)->where('status',1)->get();
        }else{
            $data['theme_title'] = "";
            $data['subthemes'] = SubTheme::where('status',1)->get();
        }
        return view('front.theme_detail',$data);
    }

    public function packages_detail ($slug=""){
        if($slug !=""){
            $data['package_detail'] = Package::where('packge_slug',$slug)->where('status',1)->first();
            $data['subpackage_detail'] = SubPackage::where('packge_slug',$slug)->where('status',1)->get();
        }else{
            $data['package_detail'] = Package::orderBy('id','Desc')->limit(0,1)->first();
            $data['subpackage_detail'] = SubPackage::where('package_id',$data['package_detail']->id)->where('status',1)->get();

        }
        return view('front.package_detail',$data);
    }

    public function send_inquiry(Request $request){
        $this->validate($request, [
            'options[]' => 'required',
            'name' => 'required|max:80',
            'email' => 'required|email|max:80',
            'phone' => 'required|numeric',
            'location'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'note' => 'required'
        ],
        [
            'options[]' => 'Option is required.',
            'name' => 'Name is required.',
            'name.max' => 'Please enter only 80 characters.',
            'email' => 'Email is required.',
            'email.email' => 'Please enter valid Email address.',
            'email.max' => 'Please enter only 80 characters.',
            'phone' => 'Phone is required.',
            'phone.numeric' => 'Please enter only Number.',
            'location'=>'Location is required.',
            'location.regex'=>'Please Enter only Alphabats and Number',
            'note' => 'Note is required.'

        ]);
        $options  = $request->options;
        $name     = $request->name;
        $to_email = $request->email;
        $phone    = $request->phone;
        $location = $request->location;
        $note     = $request->note;

        $data = ["username"=>$name,"email"=>$to_email,"phone"=>$phone,"location"=>$location,"option"=>implode(",",$options),"note"=>$note];
        $Insert_Data = ["type"=>implode(",",$options),"name"=>$name,"email"=>$to_email,"phone"=>$phone,"location"=>$location,"note"=>$note];

        $inquery  = Inquiry::create($Insert_Data);
        if($inquery){
            Mail::send("front.email_template.inquiry", $data, function($message) use ($to_email,$name,$request) {
                        $message->from($to_email,$name)
                        ->subject('Inquiry - '.env("MAIL_FROM_NAME"));
                        $message->to(env("MAIL_FROM_ADDRESS"));
                });
            return back()->with('success','Inquery Send Successfully!');
        }

    }

    public function send_contactus(Request $request){
       $name        = $request->name;
       $to_email    = $request->email;
       $phone       = $request->phone;
       $message     = $request->messege;

       if($name == ""){
           echo " Name field is  Required";
       }else if($to_email == ""){
            echo "Email field is  Required.";
        }else if($phone == ""){
            echo "Phone Number field is Required.";
        }else if($message == ""){
            echo "Message field is Required.";
        }else{

            $data        = ["name"=>$name,"email"=>$to_email,"phone"=>$phone,"usermessage"=>$message];
            $Insert_Data = ["name"=>$name,"email"=>$to_email,"phone"=>$phone,"message"=>$message];

            $inquery  = Contact::create($Insert_Data);
            if($inquery){
                Mail::send("front.email_template.contact-us", $data, function($message) use ($to_email,$name,$request) {
                            $message->from($to_email,$name)
                            ->subject('Contact us - '.env("MAIL_FROM_NAME"));
                            $message->to(env("MAIL_FROM_ADDRESS"));
                    });
                Session::flash('success', "Contact Us Message Send Successfully!");
            }
        }
    }
}
