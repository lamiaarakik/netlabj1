<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Loopback;
use Illuminate\Support\Facades\DB;
use Validator;
class LoopbackAPIController extends APIBaseController
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$all = Loopback::all();
$last=count($all);
$posts = Loopback::find($last);

return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.');
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function last(){
    $last = DB::table('loopbacks')->count();
    $post=DB::table('loopbacks')->where('id', $last)->first();
    return $this->sendResponse($post->toArray(), 'Post created successfully.');

}
public function store(Request $request)
{
$input = $request->all();
$validator = Validator::make($input, [
'name' => 'required',
'password' => 'required',
'ip_adress' => 'required',
'loopback_adress' => 'required',
'loopback_mask' => 'required'
]);
if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());
}
$post = Loopback::create($input);
return $this->sendResponse($post->toArray(), 'Post created successfully.');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$post = Loopback::find($id);
if (is_null($post)) {
return $this->sendError('Post not found.');
}
return $this->sendResponse($post->toArray(), 'Post retrieved successfully.');
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
    'loopback_adress' => 'required',
    'loopback_mask' => 'required'
]);
if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());
}
$post = Loopback::find($id);
if (is_null($post)) {
return $this->sendError('Post not found.');
}
$post->name = $input['name'];
$post->password = $input['password'];
$post->ip_adress = $input['ip_adress'];
$post->loopback_adress = $input['loopback_adress'];
$post->loopback_mask = $input['loopback_mask'];
$post->save();
return $this->sendResponse($post->toArray(), 'Post updated successfully.');
}
/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$post = Loopback::find($id);
if (is_null($post)) {
return $this->sendError('Post not found.');
}
Loopback::where('id', $post->id)
->update([
'is_delete'=>'0'
]);
return $this->sendResponse($id, 'Tag deleted successfully.');
}
}