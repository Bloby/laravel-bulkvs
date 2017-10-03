<?php

namespace Bulkvs;

class Core {
        
    /**
     * @var \SoapClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $wsdl_url;

    /**
     * @var string
     */
    protected $api_key;

    /**
     * @var string
     */
    protected $api_secret;

    /**
     * Instantiate a new instance
     */
    public function __construct()
    {
        $this->wsdl_url     = config('bulkvs.url');
        $this->api_key      = config('bulkvs.api_key');
        $this->api_secret   = config('bulkvs.is_md5') ? config('bulkvs.api_secret') : md5(config('bulkvs.api_secret'));

        $this->client = new \SoapClient($this->wsdl_url, ['trace' => 1]);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getAvailableMethods()
    {
        if (!isset($this->client)) {
            return null;
        }

        return $this->client->__getFunctions();
    }

    public function _handleQuery($method, $params = [])
    {
        if (!isset($this->client)) {
            return null; // client undefined if missed internet connection
        }

        $params = $this->filterParams($params);
        $params = [
            'apikey' => $this->api_key,
            'apisecret' => $this->api_secret,
        ] + $params;

        $result = $this->client->__soapCall($method, $params);

        return $result;
    }

    /**
     * @param array $params
     * @return array
     */
    public function filterParams($params = [])
    {
        return array_filter($params, function($value){return !is_null($value);});
    }

}