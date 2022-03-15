<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Socialite;

class userController extends Controller
{
    public function redirectToGoogle()
    {
    	 return Socialite::driver('google')->redirect();
    }

    public function handdleGoogleCallBack()
    {
    	$user = Socialite::driver('google')->user();
        print_r($user); die();

    }

        
    public function userSearch(Request $request)
    {
        // $query = $request->get('query');

        //dd($request);
        $query = trim($request->get('search_user'));
        DB::statement(DB::raw('set @row:=0'));
        $filterResult = \DB::table('users')
        ->join('tb_position', 'tb_position.id', '=', 'users.position_id')
          ->where('users.name', 'LIKE', '%'. $query. '%')
          ->orWhere('users.number_phone', 'LIKE', '%'. $query. '%')
          ->orWhere('users.address', 'LIKE', '%'. $query. '%')
          ->orWhere('users.email', 'like', '%'. $query. '%')
          ->orWhere('tb_position.name_position', 'like', '%'. $query. '%')
          ->selectRaw('*, @row:=@row+1 as row')
          ->paginate(15);   
          //dd($request);        
          return view ('admin.users.list_users',['users'=>$filterResult]);
    } 
    
    public function getIndexAdmin()
    {
    	return view ('admin.index');

    }

    public function getAdRegister()
    {
        return view('admin.register');
    }

    public function postAdRegister(Request $req)
    {
        //dd($req);
        $this->validate(
            $req,
            [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'vui lòng nhập email',
                'email.email' => 'không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'không khớp mật khẩu',
                'password.min' => 'mật khẩu tối thiểu 6 ký tự',

            ]
        );
       // dd($req);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->number_phone = $req->number_phone;
        $user->address = $req->address;
        $user->position_id = $req->position_id;
        $user->status = $req->status;
        $user->save();
        return redirect()->route('login_admin')->with('message', 'Created Account Successfully');
    }

    public function getAdLogin()
    {
        return view('admin.login');
    }

    public function postAdLogin( Request $request)
    {       
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:30'],
            ['email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu']);

        $auth = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'position_id' => $request->position_id,
            'status' =>  $request->status,
            ]);

        if($auth)
        {
            return redirect()->route('lst_prd');

        }
        else
        {
            return redirect()->route('login_admin')->with('message','Login Unsuccessful');
        }
    }

    public function getAdLogout()
    {
        Auth::logout();
        return redirect()->route('g_login_admin');
    }

    public function getLstUsers()
    {   
        DB::statement(DB::raw('set @row:=0'));
         $users= User::selectRaw('*, @row:=@row+1 as row')
         ->join('tb_position', 'tb_position.id', '=', 'users.position_id')
         ->paginate(15);
         //dd($users);
    	return view ('admin.users.list_users',['users'=>$users]);
    }

    public function getDelUsers($id)
    {
        // dd($id);
    	$users=User::find($id);
    	$users->delete();
        return redirect()->back()->with('message','Delete Product Type Success');
    }
}
