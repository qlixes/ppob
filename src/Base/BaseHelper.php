<?php

namespace qlixes\Bridger\Base;

use GuzzleHttp\Client;

class BaseHelper
{
    protected $uri;
    protected $options;
    protected $client;

    function start($uri)
    {
        if(!($this->client instanceof Client))
            $this->client = new Client(['base_uri' => $uri]);

        return $this;
    }

    /**
     * parse Response object to array
     *
     * @param integer $number
     * @return void
     */
     function parseResponseToArray($response)
     {
         return json_decode((string) $response->getBody()->getContents(), true);
     }

     function withHeader($header = [])
     {
         $this->options['headers'] = $header;

         return $this;
     }

     function withForms($forms = [])
     {
        $this->options['json'] = $forms;

        return $this;
     }

     function withParams($params = [])
     {
        $this->options['query'] = $params;

        return $this;
     }

     function request($method, $uri)
     {
        $response = $this->client->request($method, $uri, $this->options);

        return $this->parseResponseToArray($response);
     }
}