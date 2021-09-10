<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Committee;
use Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use File;
use Image;

class MemberController extends Controller
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
        $members = Member::latest()->paginate(10);
        return view('admin.pages.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $committee = Committee::all();
        return view('admin.pages.members.create', compact('committee'));
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
            'committee_id' => 'required',
            'member_name' => 'required'
        ]);
        
        $file = Input::file('image');

        if (!empty($file)){

            $image = Image::make($file);

            $path = 'admin/uploads/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            
            $image->resize(250, 350);
            $image->save($path.$filenewname);

            $member = new Member();
            $member->committee_id = $request->committee_id;
            $member->member_name = $request->member_name;
            $member->description = $request->description;
            $member->member_image = $filenewname;
            $ok = $member->save();

        }else{
            return redirect('admin/members')->with('flash_message', 'Member can not be added!');
        }

        return redirect('admin/members')->with('flash_message', 'Member added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('admin/members');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committee = Committee::all();
        $member = Member::findOrFail($id);
        return view('admin.pages.members.edit', compact('member', 'committee'));
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
            'committee_id' => 'required',
            'member_name' => 'required'
        ]);
        $file = Input::file('image');
        if (!empty($file)){
            $image = Image::make($file);

            $path = 'admin/uploads/';

            $fileName = $request->file('image')->getClientOriginalName();
            $extension = explode(".", strtolower($fileName));
            $filetype = end($extension);
            $filenewname = rand(1000000, 999999999).time().".".$filetype;
            
            //$image->save($path.$filenewname);
            
            $image->resize(250, 350);
            $image->save($path.$filenewname);

            $member = Member::find($id);
            if($member['member_image']){
                $pathToImage = 'admin/uploads/'.$member['member_image'];
                File::delete($pathToImage);
            }
            $member->committee_id = $request->committee_id;
            $member->member_name = $request->member_name;
            $member->description = $request->description;
            $member->member_image = $filenewname;
            $ok = $member->update();
            return redirect('admin/members')->with('flash_message', 'Member updated!');
        }else{
            $requestData = $request->all();
            $group = Member::findOrFail($id);
            $group->update($requestData);

            return redirect('admin/members')->with('flash_message', 'Member updated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myimg = Member::find($id);

        if($myimg['member_image']){
            $pathToImage = 'admin/uploads/'.$myimg['member_image'];
            File::delete($pathToImage);
        }
        $myimg->delete();

        return redirect('admin/members')->with('flash_message', 'Members deleted!');
    }
}
