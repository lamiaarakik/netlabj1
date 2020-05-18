<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\dynamic;
use Illuminate\Support\Facades\DB;
use Validator;
class DynamicAPIController extends APIBaseController
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$all = dynamic::all();
$last=count($all);
$posts = dynamic::find($last);

return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.');
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function last(){
    $last = DB::table('dynamics')->count();
    $post=DB::table('dynamics')->where('id', $last)->first();
    return $this->sendResponse($post->toArray(), 'Post created successfully.');

}

/**
* Display the specified resource.
*
* @param string $result
* @return \Illuminate\Http\Response
*/

/*public function updateresult($result){
    $last = DB::table('staticroutings')->count();
    $post=DB::table('staticroutings')->where('id', $last)->first();
    $post->name = $post['name'];
$post->password = $post['password'];
$post->ip_adress = $post['ip_adress'];
$post->loopback_adress = $post['loopback_adress'];
$post->loopback_mask = $post['loopback_mask'];
$post->serial0_address = $post['serial0_adress'];
$post->serial0_mask = $post['serial0_mask'];
$post->serial1_address = $post['serial1_adress'];
$post->serial1_mask = $post['serial1_mask'];
    $post->result= $result;

$post->save();
    return $this->sendResponse($post->toArray(), 'Post updated successfully.');

}*/
public function store(Request $request)
{
$input = $request->all();
$validator = Validator::make($input, [
'name' => 'required',
'password' => 'required',
'ip_adress' => 'required',
'network1_address' => 'required',
'network1_mask' => 'required',
'network2serial0_address' => 'required',
'network2_mask' => 'required',
'network3_address' => 'required',
'network3_mask' => 'required',
'network4_address' => 'required',
'network4_mask' => 'required',
'result'=>'required'
]);
if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());
}
$post = dynamic::create($input);
return $this->sendResponse($post->toArray(), 'Post created successfully.');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
/*public function show($id)
{
$post = Staticrouting::find($id);
if (is_null($post)) {
return $this->sendError('Post not found.');
}
return $this->sendResponse($post->toArray(), 'Post retrieved successfully.');
}*/
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
    'result' => 'required',
    
]);
if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());
}
$last = DB::table('dynamics')->count();

$post = dynamic::find($last);

if (is_null($post)) {
return $this->sendError('Post not found.');
}
$post->result = $input['result'];


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
$post = dynamic::find($id);
if (is_null($post)) {
return $this->sendError('Post not found.');
}
dynamic::where('id', $post->id)
->update([
'is_delete'=>'0'
]);
return $this->sendResponse($id, 'Tag deleted successfully.');
}
}