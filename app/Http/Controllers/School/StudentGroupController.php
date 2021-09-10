<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Category;
use App\Group;
use App\Studentgroup;
use App\Student;
use Auth;
use Session;

class StudentGroupController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$group_data = Studentgroup::where('status', '1')->get();
    	return view('schools.pages.groups.index', compact('group_data'));
    }

    public function groupCreate()
    {
    	$event = Event::where('status', '1')->get();
    	$category = Category::where('status', '1')->get();
    	return view('schools.pages.groups.create', compact('category', 'event'));
    }

    public function groupStore(Request $request)
    {
    	
    	$request->validate([
            'title' => 'required',
            'event_id' => 'required',
            'category_id' => 'required',
            'group_id' => 'required',
        ]);
        // dd($request);
        $sgroup = new Studentgroup();
        $sgroup->title = $request->title;
        $sgroup->description = $request->description;
        $sgroup->event_id = $request->event_id;
        $sgroup->category_id = $request->category_id;
        $sgroup->group_id = $request->group_id;
        $sgroup->user_id = Auth::user()->id;

        $sgroup->save();

        return redirect('/student-groups')->with('flash_message', 'Student group added!');
    }


    public function groupEdit($id)
    {
    	$data = Studentgroup::findOrFail($id);
    	$event = Event::where('status', '1')->get();
    	$category = Category::where('status', '1')->get();
    	return view('schools.pages.groups.edit', compact('data', 'event', 'category'));
    }

    public function groupUpdate(Request $request, $id)
    {
    	$request->validate([
            'title' => 'required',
            'event_id' => 'required',
            'category_id' => 'required',
            'group_id' => 'required',
        ]);
		
		$sgroup = Studentgroup::findOrFail($id);
        $sgroup->title = $request->title;
        $sgroup->description = $request->description;
        $sgroup->event_id = $request->event_id;
        $sgroup->category_id = $request->category_id;
        $sgroup->group_id = $request->group_id;

        $sgroup->update();
        return redirect('/student-groups')->with('flash_message', 'Student group updated!');
    }

    public function getgroups(Request $request)
    {
        $data = Group::select('id', 'title', 'class_name')->where('category_id', $request->id)->where('status', '=', '1')->get();
        return response()->json($data); 
    }

    public function getclass(Request $request)
    {
        $data = Group::select('class_name')->where('id', $request->id)->get();
        return response()->json($data); 
    }
}
