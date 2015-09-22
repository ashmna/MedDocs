<?php


namespace MD\Models;


use MD\Helpers\Model;

class Order extends Model
{
    protected $partnerId;

    protected $orderId;
    protected $parentOrderId;
    protected $clientId;
    protected $doctorId;
    protected $start;
    protected $end;
    protected $orderTypeId;
    protected $status;
    protected $description;

    protected $client;

    public function getClient() {
        return $this->client;
    }

    public function setClient(array $client) {
        $this->client = new Client($client);
        $this->clientId = $this->client->getClientId();
    }

}