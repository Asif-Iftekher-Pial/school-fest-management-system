<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\SchoolProfile;
use Auth;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use File;
use Image;

class ProfileController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewProfile()
    {
    	$school_profile = SchoolProfile::where('user_id', Auth::user()->id)->first();
    	return view('schools.pages.profiles.show', compact('school_profile'));
    }

    public function editProfile($id)
    {
    	$data= SchoolProfile::findOrFail($id);
    	return view('schools.pages.profiles.edit', compact('data'));
    }

    public function updateProfile(Request $request, $id)
    {
    	// dd($request);
    	$file = Input::file('images');

    	if (!empty($file)){

    	    $image = Image::make($file);

    	    $profile = SchoolProfile::findOrFail($id);

    	    $path = 'uploads/profiles/';

    	    $fileName = $request->file('images')->getClientOriginalName();
    	    $extension = explode(".", strtolower($fileName));
    	    $filetype = end($extension);
    	    $filenewname = rand(1000000, 999999999).time().".".$filetype;
    	    
    	    //$image->save($path.$filenewname);
    	    
    	    $image->resize(300, 300);
    	    $image->save($path.$filenewname);

    	    $profile->coordinator = $request->coordinator;
    	    $profile->mobile_number = $request->mobile_number;
    	    $profile->school_phone = $request->school_phone;
    	    $profile->school_address = $request->school_address;
    	    $profile->images = $filenewname;
    	    $profile->update();

    	}else{
    	    $profile = SchoolProfile::findOrFail($id);
    	    $profile->coordinator = $request->coordinator;
    	    $profile->mobile_number = $request->mobile_number;
    	    $profile->school_phone = $request->school_phone;
    	    $profile->school_address = $request->school_address;
    	    $profile->update();
    	}

    	return redirect('/school-profile')->with('flash_message', 'Profile Update Successfuly');
    }

}
