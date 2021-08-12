<?php 

namespace App\Traits;

use GuzzleHttp\Client;

trait IntegrationExternalTrait
{
    public function get($url, $params = [])
    {
        $client  = new Client();
        $response = $client->get($url, $params);

        return json_decode($response->getBody(),true);
    }
}
