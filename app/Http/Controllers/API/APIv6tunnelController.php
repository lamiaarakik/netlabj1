<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Ip6Tunnel;
use App\Loopback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIv6TunnelController extends APIBaseController
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $all = Ip6Tunnel::all();
        $last=count($all);
        $ip6ss = Ip6Tunnel::find($last);

        return $this->sendResponse($ip6ss->toArray(), 'Posts retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function last(){
        $last = DB::table('ipv6OverIpv4')->count();
        $ip6s=DB::table('ipv6OverIpv4')->where('id', $last)->first();
        return $this->sendResponse($ip6s->toArray(), 'Post created successfully.');

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
            'ip_address4' => 'required',
            'ip_address6' => 'required',
            'interface' => 'required',
            'tunnel_source' => 'required',
             'tunnelMode' => 'required',
            'tunnelDestinsation' => 'required'


        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $ip6s = Ip6Tunnel::create($input);
        return $this->sendResponse($ip6s->toArray(), 'Post created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ip6s = Ip6Tunnel::find($id);
        if (is_null($ip6s)) {
            return $this->sendError('Post not found.');
        }
        return $this->sendResponse($ip6s->toArray(), 'Post retrieved successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
            'ip_address4' => 'required',
            'ip_address6' => 'required',
            'interface' => 'required',
            'tunnel_source' => 'required',
            'tunnelMode' => 'required',
            'tunnelDestinsation' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $ip6s =Ip6Tunnel::find($id);
        if (is_null($ip6s)) {
            return $this->sendError('Post not found.');
        }
        $ip6s->name = $input['name'];
        $ip6s->password = $input['password'];
        $ip6s->ip_adress4 = $input['ip_address4'];
        $ip6s->ip_address6 = $input['ip_address6'];
        $ip6s->interface = $input['interface'];
        $ip6s->tunnel_source = $input['tunnel_source'];
        $ip6s->tunnelMode = $input['tunnelMode'];
        $ip6s->tunnelDestinsation = $input['tunnelDestinsation'];
        $ip6s->save();
        return $this->sendResponse($ip6s->toArray(), 'Post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ip6s = Ip6Tunnel::find($id);
        if (is_null($ip6s)) {
            return $this->sendError('Post not found.');
        }
        Loopback::where('id', $ip6s->id)
            ->update([
                'is_delete'=>'0'
            ]);
        return $this->sendResponse($id, 'Tag deleted successfully.');
    }
}