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
            'main_menu' => 'required',
            'menu_name' => 'required',
            'menu_url'  => 'required|url',
            'image'     => 'required',
            'status'    => 'required',
            'contant'   => 'required',
            'layout'    => 'required',
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
            $member->main_menu = $request->main_menu;
            $member->menu_name = $request->menu_name;
            $member->status = $request->status;
            $member->menu_url = $request->menu_url;
            $member->contant = $request->contant;
            $member->layout = $request->layout;
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

            $fontpage->main_menu = $request->main_menu;
            $fontpage->status = $request->status;
            $fontpage->menu_name = $request->menu_name;
            $fontpage->menu_url = $request->menu_url;
            $fontpage->contant = $request->contant;
            $fontpage->layout = $request->layout;
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
