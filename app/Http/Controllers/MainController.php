<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Modal\Claint;
use Hash;
use App\User;
class MainController extends Controller{

    function index(){
        return view('dashboard.login');
    }

    public function name(){
        return 'name';
    }
    
    public function user(){ 
        $data = Claint::select('id','name','ord_num','phone','address','point','del_count','item','total','count','notes','created_at','user_id')->with('user')->get();
        return view('dashboard.order.index', compact('data'));
    }
    
    function add_user(Request $res){
        $this->validate($res,[
            'name'=>'required','phone'=>'required','password'=>'required','type'=>'required']);
        User::create([
            'name'     => $res->name,
            'phone'    => $res->phone,
            'password' => bcrypt($res->password),
            'type'     => $res->type
        ]);
        $usr = User::all();
        return view('dashboard.user.add',compact('usr'));
    }

    function add_user_page(){
        $usr = User::all();
        return view('dashboard.user.add',compact('usr'));
    }

    function check_login(Request $res){
        $this->validate($res,[
            'email'     => 'required',
            'password'  => 'required|min:3',
        ]);
        $data = array(
            'name'     => $res->get('email'),
            'password'  => $res->get('password')
        );
        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return back()->with('eros','Wrong login details');
        }
    }
    
    function success_login(){
        return view('dashboard.index');
    }
    
    function logout(){
        Auth::logout();
        return redirect('login');
    }
}