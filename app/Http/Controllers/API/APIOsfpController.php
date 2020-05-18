<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\OSPFUnicast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIOspfController extends Controller

{
    public function index()
    {
        $all = OSPFUnicast::all();
        $last=count($all);
        $posts = OSPFUnicast::find($last);

        return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function last(){
        $last = DB::table('ospf')->count();
        $post=DB::table('ospf')->where('id', $last)->first();
        return $this->sendResponse($post->toArray(), 'Post created successfully.');

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
            'ip_adress' => 'required',
            'network1' => 'required',
            'network2' => 'required',
            'neighborIp' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $post = OSPFUnicast::create($input);
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
        $post = OSPFUnicast::find($id);
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
            'network1' => 'required',
            'network2' => 'required',
            'neighborIp' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $post = OSPFUnicast::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        $post->name = $input['name'];
        $post->password = $input['password'];
        $post->ip_adress = $input['ip_adress'];
        $post->network1 = $input['network1'];
        $post->network2 = $input['network2'];
        $post->neighborIp = $input['neighborIp'];
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
        $post = OSPFUnicast::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
        OSPFUnicast::where('id', $post->id)
            ->update([
                'is_delete'=>'0'
            ]);
        return $this->sendResponse($id, 'Tag deleted successfully.');
    }}


