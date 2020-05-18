<?php

namespace App\Http\Controllers;
use App\OSPFUnicast;
use Illuminate\Http\Request;

class OSPFUnicastController extends Controller
{
    public function create(Request $request){

        $name=$request['name'];
        $password=$request['password'];
        $ip_address=$request['ip_address'];
        $network1=$request['network1'];
        $network2=$request['network2'];
        $neighborIp=$request['neighborIp'];
        $interface=$request['interface'];
        $OSPFUnicast=new OSPFUnicast();
        $OSPFUnicast->name=$name;
        $OSPFUnicast->password=$password;
        $OSPFUnicast->ip_adress=$ip_address;
        $OSPFUnicast->network1=$network1;
        $OSPFUnicast->network2=$network2;
        $OSPFUnicast->neighborIp=$neighborIp;
        $OSPFUnicast->interface=$interface;

        $OSPFUnicast->save();
        return redirect('/OSPFUnicast');
    }
    public function show(){


    }
}