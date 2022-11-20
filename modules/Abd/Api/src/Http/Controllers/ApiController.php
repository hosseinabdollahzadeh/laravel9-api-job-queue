<?php

namespace Abd\Api\Http\Controllers;

use Abd\Api\Jobs\ProcessPost;
use Abd\Api\Jobs\ProcessTraveler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getJsonResponse()
    {
        $apiUrl = 'https://jsonplaceholder.typicode.com/posts';
        $response = Http::get($apiUrl);
        $posts = $response->json();

        ProcessPost::dispatch($posts);
        return 'Posts have been received successfully.';
    }

    public function getXmlResponse()
    {
        $apiUrl = 'http://restapi.adequateshop.com/api/Traveler';
        $xmlString = Http::get($apiUrl);
        $xmlObject = simplexml_load_string($xmlString);
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);
        $travelers = $phpArray['travelers']['Travelerinformation'];

        ProcessTraveler::dispatch($travelers);

        return 'Travelers have been received successfully.';
    }
}
