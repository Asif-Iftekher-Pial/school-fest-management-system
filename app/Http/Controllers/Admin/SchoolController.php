<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\SchoolProfile;
use App\Studentgroup;

class SchoolController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$schools = User::all();
    	return view('admin.pages.schools.index', compact('schools'));
    }

    public function schoolProfile($id)
    {
    	$school = User::findOrFail($id);
        $profile = SchoolProfile::where('user_id', '=', $id)->first();
       
    	return view('admin.pages.schools.profile', compact('school', 'profile'));
    }

    public function schoolEdit($id)
    {
    	$school = User::findOrFail($id);
    	return view('admin.pages.schools.edit', compact('school'));
    }

    public function schoolUpdate(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $requestData = $request->all();
        $data->update($requestData);

        return redirect('/admin/school-list')->with('flash_message', 'School info updated!');
    }

    public function studentGroup()
    {
        $data = Studentgroup::where('status', 1)->get();
        return view('admin.pages.schools.studentGroup', compact('data'));
    }

}
