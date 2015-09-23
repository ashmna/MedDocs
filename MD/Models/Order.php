<?php


namespace MD\Models;


use MD\Helpers\Model;

class Order extends Model
{
    protected $partnerId;

    protected $orderId;
    protected $parentOrderId = 0;
    protected $clientId;
    protected $doctorId = 2;
    /** @var \DateTime */
    protected $start;
    /** @var \DateTime */
    protected $end;
    protected $orderTypeId;
    protected $status  = 'new';
    protected $description;
    /** @var Client */
    protected $client;

    public function setClient(array $client) {
        $this->client = new Client($client);
        $this->clientId = $this->client->getClientId();
    }

    public function setStart($start) {
        if(is_array($start) && isset($start['_d'])) {
            $start = $start['_d'];
        }
        $this->start = new \DateTime($start);
    }

    public function setEnd($end) {
        if(is_array($end) && isset($end['_d'])) {
            $end = $end['_d'];
        }
        $this->end = new \DateTime($end);
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        if(isset($this->client)) {
            $this->client->setClientId($this->clientId);
        }
    }

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    public function getClient() {
        return $this->client;
    }

    public function getPartnerId() {
        return $this->partnerId;
    }

    public function getOrderId() {
        return $this->orderId;
    }

    public function getParentOrderId() {
        return $this->parentOrderId;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getDoctorId() {
        return $this->doctorId;
    }

    public function getOrderTypeId() {
        return $this->orderTypeId;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDescription() {
        return $this->description;
    }

    public function toArray() {
        $data = parent::toArray();
        $data['start']  = isset($this->start)   ? $this->start->format('Y-m-d H:i:s') : '';
        $data['end']    = isset($this->end)     ? $this->end->format('Y-m-d H:i:s')   : '';
        $data['client'] = isset($this->client)  ? $this->client->toArray() : [];
        $data['title']  = isset($this->orderId) ? $this->orderId : '';
        return $data;
    }


}