<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Event;
use App\Group;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function index()
    {
        $group = Group::latest()->paginate(10);
        return view('admin.pages.groups.index', compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $events = Event::where('status', '=', '1')->get();
        $category = Category::where('status', '=', '1')->get();
        return view('admin.pages.groups.create', compact('events', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required'
        ]);
        $requestData = $request->all();
        Group::create($requestData);
        return redirect('admin/groups')->with('flash_message', 'Group added!');
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
        $events = Event::where('status', '=', '1')->get();
        $category = Category::where('status', '=', '1')->get();
        $group = Group::findOrFail($id);
        return view('admin.pages.groups.edit', compact('group', 'events', 'category'));
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
        $requestData = $request->all();
        $group = Group::findOrFail($id);
        $group->update($requestData);

        return redirect('admin/groups')->with('flash_message', 'Group updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::destroy($id);
        return redirect('admin/groups')->with('flash_message', 'Group deleted!'); 
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
