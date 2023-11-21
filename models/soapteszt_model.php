<?php

class Soapteszt_Model
{
    private $client;

    public function __construct()
    {
        $options = array(
            'keep_alive' => false,
            //'trace' =>true,
            //'connection_timeout' => 5000,
            'cache_wsdl' => WSDL_CACHE_NONE,
        );

        $this->client = new SoapClient('http://localhost/feladat1/soap/lotto.wsdl',$options);
    }

    public function huzas($ev, $het)
    {
        return $this->client->getHuzas($ev, $het);
    }
}

?>