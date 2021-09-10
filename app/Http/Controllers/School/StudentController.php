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

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::where('user_id', Auth::user()->id)->get();
        return view('schools.pages.students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::where('status', '1')->get();
        $category = Category::where('status', '1')->get();
        $sgroup = Studentgroup::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('schools.pages.students.create', compact('event', 'category', 'sgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'event_id' => 'required',
            'category_id' => 'required',
            'group_id' => 'required',
            'class' => 'required',
        ]);

        $data = new Student();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->class = $request->class;
        $data->event_id = $request->event_id;
        $data->category_id = $request->category_id;
        $data->group_id = $request->group_id;
        $data->studentgroup_id = $request->studentgroup_id;
        $data->user_id = Auth::user()->id;

        $data->save();

        return redirect('/students')->with('flash_message', 'Student added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::findOrFail($id);
        $event = Event::where('status', '1')->get();
        $category = Category::where('status', '1')->get();
        $sgroup = Studentgroup::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('schools.pages.students.edit', compact('event', 'category', 'sgroup', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'event_id' => 'required',
            'category_id' => 'required',
            'group_id' => 'required',
            'class' => 'required',
        ]);

        $data = Student::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->class = $request->class;
        $data->event_id = $request->event_id;
        $data->category_id = $request->category_id;
        $data->group_id = $request->group_id;
        $data->studentgroup_id = $request->studentgroup_id;

        $data->update();

        return redirect('/students')->with('flash_message', 'Student info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
