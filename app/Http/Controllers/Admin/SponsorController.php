<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sponsor;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use File;
use Image;
use Auth;

class SponsorController extends Controller
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
        $sponsor = Sponsor::latest()->paginate(10);
        return view('admin.pages.sponsors.index', compact('sponsor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sponsors.create');
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
            'image' => 'required'
        ]);
        
        $file = Input::file('image');

        if (!empty($file)){

            $image = Image::make($file);

            $path = 'uploads/sponsors/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            
            $image->resize(300, 300);
            $image->save($path.$filenewname);

            $member = new Sponsor();
            $member->title = $request->title;
            $member->status = $request->status;
            $member->description = $request->description;
            $member->sponsors_image = $filenewname;
            $ok = $member->save();
            return redirect('admin/sponsors')->with('flash_message', 'Member added!');

        }else{
            return redirect('admin/sponsors')->with('flash_message', 'Member can not be added!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.pages.sponsors.edit', compact('sponsor'));
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

        if (!empty($file)){

            $image = Image::make($file);

            $path = 'uploads/sponsors/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            $fontpage = Sponsor::find($id);
            if($fontpage['sponsors_image']){
                $pathToImage = 'uploads/sponsors/'.$fontpage['sponsors_image'];
                File::delete($pathToImage);
            }
            
            $image->resize(300, 300);
            $image->save($path.$filenewname);

            $fontpage->title = $request->title;
            $fontpage->status = $request->status;
            $fontpage->description = $request->description;
            $fontpage->sponsors_image = $filenewname;
            $ok = $fontpage->update();

        }else{
            // dd($request);
            $requestData = $request->all();
            $pages = Sponsor::findOrFail($id);
            $pages->update($requestData);
            return redirect('admin/sponsors')->with('flash_message', 'Information updated !');
        }

        return redirect('admin/sponsors')->with('flash_message', 'Information added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myimg = Sponsor::find($id);

        if($myimg['sponsors_image']){
            $pathToImage = 'uploads/sponsors/'.$myimg['sponsors_image'];
            File::delete($pathToImage);
        }
        $myimg->delete();

        return redirect('admin/sponsors')->with('flash_message', 'Image deleted!');
    }
}
