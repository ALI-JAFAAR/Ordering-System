<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Modal\Claint;
use Validator;
use DB;
use App\User;
class ClaintController extends Controller{
    
    public function index(){
        return view('dashboard.claint.index');
    }
    
    public function store(Request $res){
        $ord  = DB::getPDO()->lastInsertId();
        $ord +=1;
        $data = Claint::create([
            'name'      => $res->get('name'),
            'ord_num'   => $ord,
            'phone'     => $res->get('phone'),
            'address'   => $res->get('address'),
            'point'     => $res->get('point'),
            'del_count' => $res->get('del_count'),
            'item'      => implode("$*#$",$res->get('item')),
            'total'     => implode("$*#$",$res->get('total')),
            'count'     => implode("$*#$",$res->get('count')),
            'notes'     => $res->get('notes'),
            'user_id'   => Auth::user()->id,
            'status'    => 0,
            'time_date' => $res->date
        ]);
        return redirect(route('index'));
    }

    function new(){
        $data = Claint::select('id','name','ord_num','phone','address','point','del_count','item','total','count','notes','user_id','status','created_at')->where('status',0)->with('user')->get();
        return view('dashboard.claint.new', compact('data'));
    }

    function complete(){
        $data = Claint::select('id','name','ord_num','phone','address','point','del_count','item','total','count','notes','user_id','status','created_at')->where('status',1)->with('user')->get();
        return view('dashboard.claint.complete', compact('data'));
    }

    function delivered(){
        $data = Claint::select('id','name','ord_num','phone','address','point','del_count','item','total','count','notes','user_id','status','created_at')->where('status',2)->with('user')->get();
        return view('dashboard.claint.delivered', compact('data'));
    }

    function rejected(){
        $data = Claint::select('id','name','ord_num','phone','address','point','del_count','item','total','count','notes','user_id','status','created_at')->where('status',3)->with('user')->get();
        return view('dashboard.claint.rejected', compact('data'));
    }

    public function status_0($id){

        $claint = Claint::find($id);
        
        $claint->status = 1;

        $claint->save();
        
        //dd($claint);

        return back()->with('success');
    }
    
    function status_1($id){

        $claint = Claint::find($id);
        
        $claint->status = 2;
        
        $claint->save();
        return back()->with('success');
    }
    
    function status_2($id){
        $claint = Claint::find($id);
        
        $claint->status = 3;
        
        $claint->save();
        return back()->with('success');
    }

    function status_3($id){
        $claint = Claint::find($id);
        
        $claint->status = 0;
        
        $claint->save();
        return back()->with('success');
    }

    function print($id){
    	$claint = Claint::with('user')->find($id);
    	return view('dashboard.order.print',compact('claint'));
    }
}
