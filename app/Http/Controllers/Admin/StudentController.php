<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Category;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::latest()->paginate(10);
        $students = Student::where('status', '=', '1')->get();
        return view('admin.pages.students.index', compact('students'));
    }

    public function indexnewone()
    {
        // $students = Student::latest()->paginate(10);
        $students = Student::where('status', '=', '1')->get();
        return view('admin.pages.students.indexnew', compact('students'));
    }

    public function paststudents()
    {
        // $students = Student::latest()->paginate(10);
        $students = Student::where('status', '=', '0')->get();
        return view('admin.pages.students.oldstudents', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::where('status', '=', '1')->get();
        $schools = User::where('status', '=', '1')->get();
        $category = Category::where('status', '=', '1')->get();
        return view('admin.pages.students.create', compact('schools', 'event', 'category'));
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
            'event_id' => 'required',
            'category_id' => 'required',
            'group_id' => 'required',
            'name' => 'required',
            'user_id' => 'required'
        ]);
        $requestData = $request->all();
        Student::create($requestData);
        return redirect('admin/students')->with('flash_message', 'Student added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::findOrFail($id);
        return view('admin.pages.students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $event = Event::where('status', '=', '1')->get();
        $schools = User::where('status', '=', '1')->get();
        $category = Category::where('status', '=', '1')->get();
        return view('admin.pages.students.edit', compact('schools', 'event', 'category', 'student'));
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
            'event_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'user_id' => 'required'
        ]);

        $requestData = $request->all();
        $stu = Student::findOrFail($id);
        $stu->update($requestData);

        return redirect('admin/students')->with('flash_message', 'Student info updated!');
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
