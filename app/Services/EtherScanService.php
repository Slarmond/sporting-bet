<?php

namespace App\Services;

class EtherScanService
{

    public function getEtherBalanceForASingleAddress()
    {
        $client_address = env('ETHERSCAN_CLIENT_ADDRESS');
        $api_key        = env('ETHERSCAN_API_KEY');
        $network        = env('Kovan');

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("${network}/api?module=account&action=balance&address=${client_address}&tag=latest&apikey=${api_key}");

        $response = json_decode($request->getBody()->getContents());

        if(is_numeric($response->result)){
            return pow(10,-18)*($response->result);
        }
        else{
            return $response->result;
        }

        
    }

    public function getEtherBalanceForMultipleAddresses()
    {
        $many_addresses = env('EHTERSCAN_MANY_ADDRESSES');
        $api_key        = env('ETHERSCAN_API_KEY');
        $network        = env('Kovan');

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("${network}/api?module=account&action=balance&address=${many_addresses}&tag=latest&apikey=${api_key}");

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

    public function getTransactionsByAddress()
    {
        $client_address = env('ETHERSCAN_CLIENT_ADDRESS');
        $api_key        = env('ETHERSCAN_API_KEY');
        $network        = env('Kovan');

        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("${network}/api?module=account&action=txlist&address=${client_address}&startblock=0&endblock=99999999&page=1&offset=10&sort=asc&apikey=${api_key}");

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

    public function getTransactionReceipt()
    {
        $client_address = env('ETHERSCAN_CLIENT_ADDRESS');
        $api_key        = env('ETHERSCAN_API_KEY');
        $network        = env('Kovan');
        $transactionHash = $this->getTransactionsByAddress($client_address)->result[0]->hash;
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("${network}/api?module=proxy&action=eth_getTransactionReceipt&txhash=${transactionHash}&apikey=${api_key}");

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

    public function checkContractExecutionStatus()
    {
        $client_address = env('ETHERSCAN_CLIENT_ADDRESS');
        $api_key        = env('ETHERSCAN_API_KEY');
        $network        = env('Kovan');
        $transactionHash = $transactionHash = $this->getTransactionsByAddress($client_address)->result[0]->hash;
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
            ->get("${network}/api?module=transaction&action=getstatus&txhash=${transactionHash}&apikey=${api_key}");

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }
}
