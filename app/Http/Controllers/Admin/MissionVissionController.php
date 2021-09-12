<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Missionvission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Image;

class MissionVissionController extends Controller
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
        $data=Missionvission::first();
        return view('pial.MissionandVission.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pial.MissionandVission.create');
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
            
            'image' => 'required',
            'mission' => 'required',
            'vission' => 'required',
        ]);

        $file = Input::file('image');

        if (!empty($file)) {

            $image = Image::make($file);

            $path = 'uploads/missionvission/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);

            $image->resize(300, 300);
            $image->save($path . $filenewname);

            $member = new Missionvission();
            $member->mission = $request->mission;
            $member->vission = $request->vission;
            $member->image = $filenewname;
            $ok = $member->save();
            return redirect()->route('mission.index')->with('flash_message', 'Info added!');
        } else {
            return redirect()->route('mission.index')->with('flash_message', 'can not be added!');
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
        return view('pial.MissionandVission.edit',compact('data'));
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
        $file = Input::file('image');

        if (!empty($file)) {

            $image = Image::make($file);

            $path = 'uploads/missionvission/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);
            $fontpage = Missionvission::find($id);
            if ($fontpage['image']) {
                $pathToImage = 'uploads/missionvission/' . $fontpage['image'];
                File::delete($pathToImage);
            }

            $image->resize(300, 300);
            $image->save($path . $filenewname);

            $fontpage->mission = $request->mission;
            $fontpage->vission = $request->vission;
            $fontpage->image = $filenewname;
            $ok = $fontpage->update();
        } else {
            // dd($request);
            $requestData = $request->all();
            $pages = Missionvission::findOrFail($id);
            $pages->update($requestData);
            return redirect()->route('mission.index')->with('flash_message', 'Information updated !');
        }

        return redirect()->route('mission.index')->with('flash_message', 'Information added!');
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
        if ($pageelement['image']) {

            $pathToImage = 'uploads/missionvission/' . $pageelement['image'];
            File::delete($pathToImage);
            $status = $pageelement->delete();
            if ($status) {
                return redirect()->route('mission.index')->with('flash_message', 'deleted successfully');
            } else {
                return redirect()->back()->with('flash_message', 'Something went wrong!');
            }
        } else {
            return back()->with('flash_message', 'Data not found');
        }
    }
}
