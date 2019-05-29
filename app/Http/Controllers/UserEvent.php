<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;

class UserEvent extends Controller
{
    public function index(){
    $events=DB::table('event_invitation')->where('user_id',Auth::user()->id)->get();
    $count_events=DB::table('event_invitation')->where('user_id',Auth::user()->id)->count();
    $confirm_events=DB::table('event_invitation')->select('confirm')->where('user_id',Auth::user()->id)->get();
    $attending_events=DB::table('event_invitation')->select('confirm')->where('user_id',Auth::user()->id)->where('confirm',1)->count();
    $get_attending_events=DB::table('event_invitation')->where('user_id',Auth::user()->id)->where('confirm',1)->get();
    $get_pendig_events=DB::table('event_invitation')->where('user_id',Auth::user()->id)->where('confirm',0)->get();
    return view('userevent.userdashboard',compact('events','count_events','confirm_events','attending_events','get_attending_events','get_pendig_events'));
    return view('userevent.userdashboards');
    }  

    public function attendevent(Request $request){
    	$event_id=$request->eventid;
    	DB::table('event_invitation')->where('id',$event_id)->update(['confirm'=>1]);
    	return back()->with('confirm','you are attending this event,thank you');

    } 

    public function eventcancel(Request $request){
    	$eventcancel_id=$request->cancel_eventid;
    	DB::table('event_invitation')->where('id',$eventcancel_id)->update(['confirm'=>0]);
    	return back()->with('cancel_confirm','you just cancel this event');  


    }
    public function eventview(Request $request){
        $id=$request->id;
        $get_invitations=DB::table('event_invitation')->where('id',$id)->get();
        return view('userevent.viewevent',compact('get_invitations'));
    }
}
