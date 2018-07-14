<?php

namespace Britech\ApiPolitaniSmd;

use GuzzleHttp\Client as HttpClient;

class Britech
{
    function __construct()
    {
        // 
    }

    public function httpClient($method, $url,$body=[], $custom = false)
    {
        $client = new HttpClient;

        if($custom == false) {
            $url = config('api-politani-smd.api_url') . $url;
        }    

        $res = $client->request($method, $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('api-politani-smd.token'),
                'Content-Type'  => 'application/json',
                'Accept' => 'application/json'
            ],
            'json'=>$body
        ]);

        $res->getHeader('content-type');

        return response()->json(json_decode($res->getBody(), true));
    }

    public function forgetParams() 
    {
        return response()->json(['message' => 'Request ini perlu parameter.']);
    }
}
