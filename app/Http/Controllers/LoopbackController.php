<?php

namespace App\Http\Controllers;
use App\Loopback;
use Illuminate\Http\Request;

class LoopbackController extends Controller
{
  public function create(Request $request){

$name=$request['name'];
$password=$request['password'];
$ip_address=$request['ip_address'];
$loopback_address=$request['loopback_address'];
$loopback_mask=$request['loopback_mask'];
$loopback=new Loopback();
$loopback->name=$name;
$loopback->password=$password;
$loopback->ip_adress=$ip_address;
$loopback->loopback_adress=$loopback_address;
$loopback->loopback_mask=$loopback_mask;

$loopback->save();
return redirect('/loopback');
  }
  public function show(){

    
}
}
