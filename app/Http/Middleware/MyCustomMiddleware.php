<?php

namespace App\Http\Middleware;

use Closure;

class MyCustomMiddleware{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // [SNIPPET]
    public function handle($request, Closure $next){

        // set from url param
        $request->test_key = $request->has('test_key') ? $request->input('test_key') : 'foo';

        // set from header
        $request->my_header = $request->header('x-custom-header');

        // set constant
        $request->blah = date("Y-m-d H:i:s");

        // deny requests without a custom header value
        if(empty($request->my_header)){
            return response()->json(['error' => 'No custom header value found!'], 400);
        }

        // continue
        return $next($request);
    }
    // [/SNIPPET]

}
