<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Http\Controllers\Controller;
use App\RipUnicast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIRipController extends APIBaseController
{
public function index()
{
    $all = RipUnicast::all();
    $last=count($all);
    $rips = RipUnicast::find($last);

    return $this->sendResponse($rips->toArray(), 'rips retrieved successfully.');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function last(){
        $last = DB::table('Rip')->count();
        $rip=DB::table('rip')->where('id', $last)->first();
        return $this->sendResponse($rip->toArray(), 'rip created successfully.');

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
            'ip_adress' => 'required',
            'network' => 'required',
            'version' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $rip = RipUnicast::create($input);
        return $this->sendResponse($rip->toArray(), 'rip created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rip = RipUnicast::find($id);
        if (is_null($rip)) {
            return $this->sendError('rip not found.');
        }
        return $this->sendResponse($rip->toArray(), 'rip retrieved successfully.');
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
            'ip_adress' => 'required',
            'network' => 'required',
            'version' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $rip = RipUnicast::find($id);
        if (is_null($rip)) {
            return $this->sendError('rip not found.');
        }
        $rip->name = $input['name'];
        $rip->password = $input['password'];
        $rip->ip_adress = $input['ip_adress'];
        $rip->network = $input['network'];
        $rip->version = $input['version'];
        $rip->save();
        return $this->sendResponse($rip->toArray(), 'rip updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rip = RipUnicast::find($id);
        if (is_null($rip)) {
            return $this->sendError('rip not found.');
        }
        RipUnicast::where('id', $rip->id)
            ->update([
                'is_delete'=>'0'
            ]);
        return $this->sendResponse($id, 'Tag deleted successfully.');
    }


}