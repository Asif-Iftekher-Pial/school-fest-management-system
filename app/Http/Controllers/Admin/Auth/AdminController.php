<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userList()
    {
        $data = Admin::all();
        return view('admin.auth.user_list', compact('data'));
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function registerUser(Request $request)
    {
        
        $data = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'mobile' =>['required', 'min:11'],
                'type'=>['required', 'string'],
                'status'=>['required','string']
                ]);
        
        $check =  Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'type'=> $data['type'],
            'status'=>$data['status'],
            'password' => Hash::make($data['password']),
        ]);
        return Redirect::to("/admin/user_list")->withSuccess('Great! User Creat successfully.');
    
    }

    public function editUser($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.auth.edit', compact('data'));
    }

    public function updateUser(Request $request, $id)
    {
        $data = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'mobile' =>['required', 'min:11'],
                'type'=>['required', 'string'],
                'status'=>['required','string']
                ]);
        $adminUser = Admin::find($id);

        $adminUser->update($data);
        return Redirect::to("/admin/user_list")->withSuccess('Great! User update successfully.');

    }

    public function changeUserPassword()
    {
        return view('admin.auth.changepassword');
    }

    public function updatePassword(Request $request, $id)
    {
        // dd($request);
        $data = request()->validate([
                'old_password' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],            
            ]);
            if(Hash::check($request->old_password, Auth::user()->password)){
                $user=Admin::find(Auth::user()->id);
                $user->email=Auth::user()->email;
                $user->password=Hash::make($request->password);
                // dd($user->password);
                $user->update();
                return back()->withSuccess('Great! User update successfully.');
            }else{
                return back()->withSuccess("Old Password didn't match");
            }
    }
    
}
