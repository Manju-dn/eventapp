<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use Illuminate\Http\Request;
use App\Event;
use App\EventInvitaion;

use Validator;
class UserAdmin extends Controller
{
 public function index(){
   $events=DB::table('events')->get();
   $users=DB::table('users')->get();

   return view('admin.eventcreate',compact('users','events'));
 }

 public function create(){
  return view('admin.create');
}


public function store_event(Request $request){

  $validator = Validator::make($request->all(), [
   'ename' => 'required',
   'description' => 'required',
   'location' => 'required',
   'date' => 'required',
    'lat' => 'required',
    'lng' => 'required',

 ]);

  if($validator->fails())
  {
    return redirect()->back()->withErrors($validator)->withInput();
  }
  $product=new Event;
  $product->ename=$request->ename;
  $product->date=$request->date;
  $product->location=$request->location;
  $product->description=$request->description;
  $product->lat=$request->lat; 
   $product->long=$request->lng;


  $product->save();  
  return back()->with('msg','Event created successfully');

}  



public function inviteusers(Request $request){
  $user_id=$request->userid;
  $eventt_id=$request->eventid;
  $get_event= DB::table('events')->where('id',$eventt_id)->first();
  $invited_by=Auth::user()->name;

  $data = array(
    'user_id'=>$user_id,
    'event_invited_by' =>$invited_by,
    'event_name' =>$get_event->ename,
    'date'=>$get_event->date,
    'location'=>$get_event->location,
    'description'=>$get_event->description,
    'confirm'=> 0,
    'lat'=>$get_event->lat,
    'long'=>$get_event->long
  );

  DB::table('event_invitation')->insert($data);

/*
or
DB::table('event_invitation')->insert(['user_id'=>$user_id,'event_invited_by' => Auth::user()->name,'event_name' => $ename,'date'=> $date,'location'=>$location,'description'=>$description,'confirm'=> 0 ]);*/
return back()->with('msg','Invitation sent successfully');

}


}
