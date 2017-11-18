<?php

namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

trait ApiRequest
{
    
    public function apirequest($method, $url, $params=[])
    {

      $client = new Client([
	       'base_uri' => 'https://api.nexmo.com/',
      ]);

      try {
        $response       = $client->request($method, $url, ['form_params' => $params]);
        $body           = $response->getBody();

        $statuscode     = $response->getStatusCode();
  
        return  json_decode($body->getContents());

      } catch (ClientException $e) {

          $request  =  $e->getRequest();
          return json_decode($e->getResponse()->getBody(true)->getContents());

      } catch (RequestException $e) {

          $request  =  $e->getRequest();
          if ($e->hasResponse()) {
               return json_decode($e->getResponse()->getBody(true)->getContents());
          }
      } 
    }  
}