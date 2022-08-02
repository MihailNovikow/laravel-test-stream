<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StreamRequest;
use App\Http\Resources\StreamResource;
use App\Models\Stream;
use Illuminate\Http\Request;
/*use Guzzle;
  use GuzzleHttp\Middleware;
        use Illuminate\Support\Facades\Http;
        use Psr\Http\Message\RequestInterface; */
class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Stream $response)
    {
        $response = Stream::get('https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/active-live-stream-count', [
            'name' => '',
            'description' => '',
        ]);
        /*$response = Http::withMiddleware(
            Middleware::mapRequest(
                function (RequestInterface $request) {
                $request->withHeader('X-Example', 'Value');
         
                return $request;
            })
        ->get('https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/active-live-stream-count'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StreamRequest $request)
    {
        $stream = Stream::create($request->validated());

        return new StreamResource($stream);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        return new StreamResource($stream);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(StreamRequest $request, Stream $stream)
    {
        $stream->update($request->validated());

        return new StreamResource($stream);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
        $stream->delete();

        return response()->noContent();
    }

    public function test(Stream $stream) {
 
$response = Http::get('https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/active-live-stream-count', [
    'name' => '',
    'description' => '',

]);

    }
}