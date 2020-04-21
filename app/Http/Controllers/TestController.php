<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// [SNIPPET]
class TestController extends Controller
{

    public function __construct(){
        $this->middleware('my-custom-middleware', ['except' => ['test_xyz']]);
    }

    public function test_abc(Request $request){

        // check if data field is set and non-empty, if so let's use it, otherwise use the default
        $data = [
            "test_key" => isset($request->test_key) && !empty($request->test_key) ? $request->test_key : 'NO TEST KEY',
            "my_header" => isset($request->my_header) && !empty($request->my_header) ? $request->my_header : 'NO HEADER',
            "blah" => isset($request->blah) && !empty($request->blah) ? $request->blah : 'NO BLAH'
        ];

        // response
        return response()->json($data, 200);
    }

    public function test_xyz(Request $request){

        // check if data field is set and non-empty, if so let's use it, otherwise use the default
        $data = [
            "test_key" => isset($request->test_key) && !empty($request->test_key) ? $request->test_key : 'NO TEST KEY',
            "my_header" => isset($request->my_header) && !empty($request->my_header) ? $request->my_header : 'NO HEADER',
            "blah" => isset($request->blah) && !empty($request->blah) ? $request->blah : 'NO BLAH'
        ];

        // response
        return response()->json($data, 200);
    }

}
// [/SNIPPET]
