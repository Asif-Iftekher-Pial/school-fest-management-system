<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;
use Image;



class PageController extends Controller
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
        $pagedata = page::paginate(5);
        return view('pial.Page.index', compact('pagedata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pial.Page.create');
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
            'subtitle' => 'required',
            'image' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $file = Input::file('image');

        if (!empty($file)) {

            $image = Image::make($file);

            $path = 'uploads/pages/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);

            $image->resize(300, 300);
            $image->save($path . $filenewname);

            $member = new Page();
            $member->title = $request->title;
            $member->subtitle = $request->subtitle;
            $member->status = $request->status;
            $member->description = $request->description;
            $member->image = $filenewname;
            $ok = $member->save();
            return redirect()->route('pageSetup.index')->with('flash_message', 'Page added!');
        } else {
            return redirect()->route('pageSetup.create')->with('flash_message', 'can not be added!');
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
        $pagedata = Page::findOrFail($id);
        return view('pial.Page.edit', compact('pagedata'));
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

            $path = 'uploads/pages/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999) . time() . "." . $filetype;

            //$image->save($path.$filenewname);
            $fontpage = Page::find($id);
            if ($fontpage['image']) {
                $pathToImage = 'uploads/pages/' . $fontpage['image'];
                File::delete($pathToImage);
            }

            $image->resize(300, 300);
            $image->save($path . $filenewname);

            $fontpage->title = $request->title;
            $fontpage->status = $request->status;
            $fontpage->subtitle = $request->subtitle;
            $fontpage->description = $request->description;
            $fontpage->image = $filenewname;
            $ok = $fontpage->update();
        } else {
            // dd($request);
            $requestData = $request->all();
            $pages = Page::findOrFail($id);
            $pages->update($requestData);
            return redirect()->route('pageSetup.index')->with('flash_message', 'Information updated !');
        }

        return redirect()->route('pageSetup.index')->with('flash_message', 'Information added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageelement = Page::find($id); //find each data by their id
        if ($pageelement['image']) {

            $pathToImage = 'uploads/pages/' . $pageelement['image'];
            File::delete($pathToImage);
            $status = $pageelement->delete();
            if ($status) {
                return redirect()->route('pageSetup.index')->with('flash_message', 'deleted successfully');
            } else {
                return redirect()->back()->with('flash_message', 'Something went wrong!');
            }
        } else {
            return back()->with('flash_message', 'Data not found');
        }
    }
}
