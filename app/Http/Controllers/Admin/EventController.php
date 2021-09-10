<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Event;

use File;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;

class EventController extends Controller
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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $events = Event::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $events = Event::latest()->paginate($perPage);
        }

        return view('admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.events.create');
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
            'title' => 'required',
        ]);

        $file = $request->image;

        if (!empty($file)) {

            $image = Image::make($file);

            $path = 'uploads/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);

            $image->resize(600, 400);
            $image->save($path . $filenewname);

            $event = new Event();
            $event->title = $request->title;
            $event->status = $request->status;
            $event->description = $request->description;
            $event->eventimg = $filenewname;
            $ok = $event->save();

        } else {
            $requestData = $request->all();
            Event::create($requestData);
            return redirect('admin/events')->with('flash_message', 'Event added!');
        }

        return redirect('admin/events')->with('flash_message', 'Event added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.pages.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event = Event::findOrFail($id);

       return view('admin.pages.events.edit', compact('event'));
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
        $file = $request->image;

        if (!empty($file)){
            $event = Event::findOrFail($id);

            $image = Image::make($file);

            $path = 'uploads/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;
        
            $image->save($path.$fileName);
        
            $image->resize(600, 400);
            $image->save($path . $filenewname);

            if($event['eventimg']){
                $pathToImage = 'uploads/'.$event['eventimg'];
                File::delete($pathToImage);
            

            $event->title = $request->title;
            $event->status = $request->status;
            $event->description = $request->description;
            $event->eventimg = $filenewname;
            $ok = $event->update();
        }
        }else{
            $requestData = $request->all();
            $event = Event::findOrFail($id);
            $event->update($requestData);
        }
        

        return redirect('admin/events')->with('flash_message', 'Event updated!');
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
