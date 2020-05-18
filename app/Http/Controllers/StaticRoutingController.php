<?php

namespace App\Http\Controllers;
use App\Staticrouting;
use Illuminate\Http\Request;

class StaticRoutingController extends Controller
{
  public function create(Request $request){

$name=$request['name'];
$password=$request['password'];
$ip_address=$request['ip_address'];
$loopback_address=$request['loopback_address'];
$loopback_mask=$request['loopback_mask'];
$serial0_address=$request['serial0_address'];
$serial0_mask=$request['serial0_mask'];
$serial1_address=$request['serial1_address'];
$serial1_mask=$request['serial1_mask'];
$result=$request['result'];
$static=new Staticrouting();
$static->name=$name;
$static->password=$password;
$static->ip_adress=$ip_address;
$static->loopback_adress=$loopback_address;
$static->loopback_mask=$loopback_mask;
$static->serial0_address=$serial0_address;
$static->serial0_mask=$serial0_mask;
$static->serial1_address=$serial1_address;
$static->serial1_mask=$serial1_mask;
$static->result=$result;
$static->save();
return redirect('/staticRouting');
  }
  public function show(){

    
}
}
