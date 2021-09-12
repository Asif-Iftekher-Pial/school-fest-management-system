<?php

namespace App\Http\Controllers\Admin;

use App\Missionvission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;
use Image;

class ChairmanMessageController extends Controller
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
        $data=Missionvission::select('id','chair_message','chair_image')->first();
        // dd($data);
        
        return view('pial.chairman_message.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pial.chairman_message.create');
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
            
            'chair_image' => 'required',
            'chair_message' => 'required',
        ]);

        $file = Input::file('chair_image');

        if (!empty($file)) {

            $chair_image = Image::make($file);

            $path = 'uploads/chairimage/';

            $fileName = $request->file('chair_image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$chair_image->save($path.$filenewname);

            $chair_image->resize(300, 300);
            $chair_image->save($path . $filenewname);

            $member = new Missionvission();
            $member->chair_message = $request->chair_message;
            
            $member->chair_image = $filenewname;
            $ok = $member->save();
            return redirect()->route('chairman.index')->with('flash_message', 'Info added!');
        } else {
            return redirect()->route('chairman.index')->with('flash_message', 'can not be added!');
        }
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
        $data=Missionvission::findOrFail($id);
        return view('pial.chairman_message.edit',compact('data'));
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
        $file = Input::file('chair_image');

        if (!empty($file)) {

            $image = Image::make($file);

            $path = 'uploads/chairimage/';

            $fileName = $request->file('chair_image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);
            $fontpage = Missionvission::find($id);
            if ($fontpage['chair_image']) {
                $pathToImage = 'uploads/chairimage/' . $fontpage['chair_image'];
                File::delete($pathToImage);
            }

            $image->resize(300, 300);
            $image->save($path . $filenewname);

            $fontpage->chair_message = $request->chair_message;
            $fontpage->chair_image = $filenewname;
            $ok = $fontpage->update();
        } else {
            // dd($request);
            $requestData = $request->all();
            $pages = Missionvission::findOrFail($id);
            $pages->update($requestData);
            return redirect()->route('chairman.index')->with('flash_message', 'Information updated !');
        }

        return redirect()->route('chairman.index')->with('flash_message', 'Information added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageelement = Missionvission::find($id); //find each data by their id
        if ($pageelement['chair_image']) {

            $pathToImage = 'uploads/chairimage/' . $pageelement['chair_image'];
            File::delete($pathToImage);
            $status = $pageelement->delete();
            if ($status) {
                return redirect()->route('chairman.index')->with('flash_message', 'deleted successfully');
            } else {
                return redirect()->back()->with('flash_message', 'Something went wrong!');
            }
        } else {
            return back()->with('flash_message', 'Data not found');
        }
    }
}
