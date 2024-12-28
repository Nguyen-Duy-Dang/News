<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller {
    public function create() {
        return view('users.create');
    }
    public function avatar(Request $request ){
        if ($request->hasFile('avatar')) {
             $file = $request->file('avatar');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('images'), $filename);
         } else {
             $filename = null ;
         }
         $data = DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'avatar' => $filename,
            'role' => $request->input('role')
        ]);
        return view('dashboard', ['user'=>$data]);
   }
   public function dashboard()
   {
       $user = Auth::user();
       return view('admin.dashboard', compact('user'));
   }
   
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'avatar' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users/create')->with('success', 'User created successfully.');
    }

/////////
    public function home(){
        $data = db::table('news')->select('*')->get();
        return view('user/index', ['news'=>$data]);
       }
       
       
       public function index(){
        $data = db::table('users')->select('*')->get();
        return view('admin/user/index', ['users'=>$data]);
       }
       public function dalete($id){
        $userDelete = User::find($id);
        if($userDelete->delete()){
            return redirect('user');
                };
       }
       
       
}

