<?php


namespace App\Http\Controllers;


use App\Ip6Tunnel;
use Illuminate\Http\Request;

class Ip6TunnelController extends Controller
{
    public function create(Request $request){

        $nom=$request['nom'];
        $password=$request['password'];
        $ip_address4=$request['ip_address4'];
        $ip_address6=$request['ip_address6'];
        $interface=$request['interface'];
        $tunnel_source=$request['tunnel_source'];
        $tunnelMode=$request['tunnelMode'];
        $tunnelDestinsation=$request['tunnelDestinsation'];
        $ip6Tunnel=new Ip6Tunnel();
        $ip6Tunnel->nom=$nom;
        $ip6Tunnel->password=$password;
        $ip6Tunnel->ip_address4=$ip_address4;
        $ip6Tunnel->ip_address6=$ip_address6;
        $ip6Tunnel->interface=$interface;
        $ip6Tunnel->tunnel_source=$tunnel_source;
        $ip6Tunnel->tunnelMode=$tunnelMode;
        $ip6Tunnel->tunnelDestinsation=$tunnelDestinsation;

        $ip6Tunnel->save();
        return redirect('/Ip6OverIp4');
    }
    public function show(){


    }
}
