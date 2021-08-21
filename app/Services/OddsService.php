<?php

namespace App\Services;

class OddsService
{
    public function getData()
    {
        $sport      = env('SPORT');
        $region     = env('REGIONS');
        $markets    = env('MARKETS');
        $api_key    = env('ODDS_API_KEY');

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("https://api.the-odds-api.com/v4/sports/${sport}/odds/?regions=${region}&markets=${markets}&apiKey=${api_key}");

        $response = json_decode($request->getBody()->getContents());
        
        return $response[count($response) - 1];
    }
}
