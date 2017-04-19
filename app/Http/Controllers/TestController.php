<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;

class TestController extends Controller
{
   public function index($myname)
   {
   	$myname .=" gwapo";
   	 return view("home")->with(["name" => $myname]);
   }
   public function create()
   {
   	$logs = new Logs();
   	$logs->event_logs = "Nag delete og record= record id 1002";
   	$logs->userid =1;
   	$logs->save();

   	 return "logs created id : " . $logs->id; 
   }

   public function update($id,$eventlogs)
   {
   		$logs = Logs::find($id);
	   	$logs->event_logs = $eventlogs;
	   	$logs->userid =1;
	   	$logs->save();


   	 	return "logs updated id : " . $logs->id; 
   }

   public function getlogs($id)
   {
   		return Logs::find($id);
   }
   public function del_logs($id)
   {
   		$log = Logs::find($id);
   		$log->delete();
   }

   public function myanimals()
   {
   		$animals = array("Dog","Cat","Horse","Frog","Fish","Cow");

   		return view("animals")->with(["animals" => $animals]);
   }
}
