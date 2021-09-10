<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Albumimage;
use App\Album;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use File;
use Image;

class ImageController extends Controller
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
        $images = Albumimage::latest()->paginate(10);
        
        return view('admin.pages.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::all();
        return view('admin.pages.images.create', compact('album'));
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
            'album_id' => 'required'
        ]);
        
        $file = Input::file('image');

        if (!empty($file)){

            $image = Image::make($file);

            $path = 'uploads/albums/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            
            $image->resize(600, 400);
            $image->save($path.$filenewname);

            $albimg = new Albumimage();
            $albimg->album_id = $request->album_id;
            $albimg->img_name = $filenewname;
            $ok = $albimg->save();

        }else{
            return redirect('admin/albumimages')->with('flash_message', 'Image can not be added!');
        }

        return redirect('admin/albumimages')->with('flash_message', 'Image added!');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myimg = Albumimage::find($id);

        if($myimg['img_name']){
            $pathToImage = 'uploads/albums/'.$myimg['img_name'];

            File::delete($pathToImage);
        }
        $myimg->delete();

        return redirect('admin/albumimages')->with('flash_message', 'Image deleted!');
    }
}
