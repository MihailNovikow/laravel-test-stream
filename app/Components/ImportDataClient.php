<?php

namespace App\Components;

class ImportDataClient
{
    public function __construct($client)
    {
        $this->$client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/',

            // You can set any number of default request options.
            'timeout'  => 2.0,
            'verify' => false,
        ]);

        
    }
}