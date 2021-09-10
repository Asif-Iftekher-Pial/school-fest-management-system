<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SliderImage;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use File;
use Image;

class SliderImageController extends Controller
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
        $sliderimages = SLiderImage::all();
        return view('admin.pages.sliderimages.index', compact('sliderimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.sliderimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'image' => 'required',
            'title' => 'required'
        ]);
        
        $file = Input::file('image');
            
        if (!empty($file)){
           // dd($file);
            $image = Image::make($file);
           
            $path = 'uploads/sliders/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            
            $image->resize(1920, 700);
            $image->save($path.$filenewname);

            $albimg = new SliderImage();
            $albimg->title = $request->title;
            $albimg->sl_date = $request->sl_date;
            $albimg->sliderimage = $filenewname;
            $ok = $albimg->save();

        }else{
            return redirect('admin/sliderimages')->with('flash_message', 'Image can not be added!');
        }

        return redirect('admin/sliderimages')->with('flash_message', 'Image added!');
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
        $myimg = SliderImage::find($id);

        if($myimg['sliderimage']){
            $pathToImage = 'uploads/sliders/'.$myimg['sliderimage'];
            File::delete($pathToImage);
        }
        $myimg->delete();

        return redirect('admin/sliderimages')->with('flash_message', 'Image deleted!');
    }
}
