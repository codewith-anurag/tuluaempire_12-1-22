<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSetting;
use Illuminate\Support\Facades\Crypt;
use App\Helper\CryptoCode;

class ContactSettingController extends Controller
{
    public function index(){

        $data['setings_data'] = ContactSetting::all();
        return view('admin.contactsetting.index',$data);
    }

    public function create(){

        return view('admin.contactsetting.create');
    }


    public function store(Request $request){

        $barnch_name       = $request->barnch_name;
        $address           = $request->address;
        $phone1            = $request->phone1;
        $phone2            = $request->phone2;
        $email             = $request->email;

        $data = array("barnch_name"=>$barnch_name,"address"=>$address,"phone1"=>$phone1,"phone2"=>$phone2,"email"=>$email);

        ContactSetting::create($data);
        $request->session()->flash('success', "Contact Setting is Add successfully!");
        return redirect(route('contactssetting'));
    }

    public function edit_contactsetting($id){
        $id = CryptoCode::decrypt($id);
        $data['edit_contact_setting'] = ContactSetting::where('id',$id)->first();

        return view('admin.contactsetting.edit',$data);
    }

    public function update_contactsetting(Request $request){
        $id                = $request->id;
        $barnch_name       = $request->barnch_name;
        $address           = $request->address;
        $phone1            = $request->phone1;
        $phone2            = $request->phone2;
        $email             = $request->email;

        $data = array("barnch_name"=>$barnch_name,"address"=>$address,"phone1"=>$phone1,"phone2"=>$phone2,"email"=>$email);
        ContactSetting::where('id',$id)->update($data);
        $request->session()->flash('success', "Contact Setting is Update successfully!");
        return redirect(route('contactssetting'));
    }

    public function delete_contactsetting($id,Request $request){
        $id = Crypt::decrypt($id);
        $delete = ContactSetting::destroy($id);
        if($delete){
            $request->session()->flash('success', "Contact Setting is Delete successfully!");
            return redirect(route('contactssetting'));

        }
    }
}
