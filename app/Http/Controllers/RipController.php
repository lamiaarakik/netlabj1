<?php


namespace App\Http\Controllers;


use App\RipUnicast;
use Illuminate\Http\Request;

class RipController extends  Controller
{
    public function create(Request $request){

        $name=$request['name'];
        $password=$request['password'];
        $ip_address=$request['ip_address'];
        $version=$request['version'];
        $network=$request['network'];
        $ripUnicast=new RipUnicast();
        $ripUnicast->name=$name;
        $ripUnicast->password=$password;
        $ripUnicast->ip_adress=$ip_address;
        $ripUnicast->network=$network;
        $ripUnicast->version=$version;

        $ripUnicast->save();
        return redirect('/RipUnicast');
    }
    public function show(){


    }
}