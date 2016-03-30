<?php
namespace Ficus\Link;

class Client extends BaseLink {
    
    
    private $client;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getClient()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Client;
     */
    function getClient() {
        if (is_null($this->client)) {
            $this->client = new \Ficus\Client();
            if (\MongoId::isValid($this->getId())) {
                $this->client->setId($this->getId());
                $this->client->query();
            }
        }
        return $this->client;
    }
    
}