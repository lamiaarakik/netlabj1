<?php

namespace App\Http\Controllers;
use App\dynamic;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
  public function create(Request $request){

$name=$request['name'];
$password=$request['password'];
$ip_adress=$request['ip_adress'];
$network1_address=$request['network1_address'];
$network1_mask=$request['network1_mask'];
$network2_address=$request['network2_address'];
$network2_mask=$request['network2_mask'];
$network3_address=$request['network3_address'];
$network3_mask=$request['network3_mask'];
$network4_address=$request['network4_address'];
$network4_mask=$request['network4_mask'];
$result=$request['result'];
$dynamic=new dynamic();
$dynamic->name=$name;
$dynamic->password=$password;
$dynamic->ip_adress=$ip_adress;
$dynamic->network1_address=$network1_address;
$dynamic->network1_mask=$network1_mask;
$dynamic->network2_address=$network2_address;
$dynamic->network2_mask=$network2_mask;
$dynamic->network3_address=$network3_address;
$dynamic->network3_mask=$network3_mask;
$dynamic->network4_address=$network4_address;
$dynamic->network4_mask=$network4_mask;
$dynamic->result=$result;
$dynamic->save();
return redirect('/dynamic');
  }
  public function show(){

    
}
}
