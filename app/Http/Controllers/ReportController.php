<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modal\Claint;
use App\User;

class ReportController extends Controller{
    

    function index(){
    	
    }

    function user(){

		$data = User::all();
		return view('dashboard.report.user',compact('data'));    	

    }

    function rejected(){

        $data = User::all();
        return view('dashboard.report.rejected',compact('data'));       

    }

    function delivered(){

        $data = User::all();
        return view('dashboard.report.delivered',compact('data'));       

    }

    function user_report(Request $res){
        $data = User::all();
        $re = Claint::select('user_id','id','total')
        ->whereBetween('created_at',[$res->from, $res->to])->where('user_id',$res->user_id)->with('user')->get();
        return view('dashboard.report.user', compact('re'),compact('data'));
    }

    function rejected_report(Request $res){
        $data = User::all();
        $re = Claint::select('user_id','id','total')
        ->whereBetween('created_at', [$res->from, $res->to])->where([['user_id',$res->user_id],['status',3]])->with('user')->get();
        // dd($re);
        return view('dashboard.report.rejected', compact('re'),compact('data'));
    }

    function delivered_report(Request $res){
        $data = User::all();
        $re = Claint::select('user_id','id','total')
        ->whereBetween('created_at', [$res->from, $res->to])->where([['user_id',$res->user_id],['status',2]])->with('user')->get();
        return view('dashboard.report.delivered', compact('re'),compact('data'));
    }

}
