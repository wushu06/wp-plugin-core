<?php
namespace HmuCore\Request;

use Com\Tecnick\Color\Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Api
 * @package HmuCore\Request
 */
class Api
{

    private $url = 'https://jsonplaceholder.typicode.com/todos/1';
    private $url2 = 'https://reqres.in/api/users?page=2';
    /**
     * @throws GuzzleException
     */
    public function get()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $this->url);
            if( $response->getStatusCode() == 200) {
                echo '<div><pre>'.$response->getBody().'</pre></div>'; // '{"id": 1420053, "name": "guzzle", ...}'

                $request = new \GuzzleHttp\Psr7\Request('GET', $this->url2);
                $promise = $client->sendAsync($request)->then(function ($response) {
                    echo '<h2>second</h2>';
                    echo '<div><pre>' . $response->getBody().'</pre></div>';
                });
                $promise->wait();
            }
        } catch (\Exception $e) {
            throw new \Exception('Can\'t connect!.');
        }

    }
}