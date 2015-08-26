<?php 
namespace Application\Model\Entity;

class Shipping
{
    private $shipping_id;
    // Add Tables
    private $shipping_courier_service;
    private $shipping_method;
    private $state;

    function getShipping_id() {
        return $this->shipping_id;
    }

    function getShipping_courier_service() {
        return $this->shipping_courier_service;
    }

    function getShipping_method() {
        return $this->shipping_method;
    }

    function getState() {
        return $this->state;
    }

    function setShipping_id($shipping_id) {
        $this->shipping_id = $shipping_id;
    }

    function setShipping_courier_service($shipping_courier_service) {
        $this->shipping_courier_service = $shipping_courier_service;
    }

    function setShipping_method($shipping_method) {
        $this->shipping_method = $shipping_method;
    }

    function setState($state) {
        $this->state = $state;
    }

        public function exchangeArray($data=NULL)
    {
        $this->shipping_id = (isset($data['shipping_id'])) ? $data['shipping_id'] : null;
        $this->transfer_number     = (isset($data['transfer_number'])) ? $data['transfer_number'] : null;
        $this->date = (isset($data['date'])) ? $data['date'] : null;
        $this->shipping_courier_service  = (isset($data['shipping_courier_service'])) ? $data['shipping_courier_service'] : null;
        $this->state  = (isset($data['state'])) ? $data['state'] : null;
        $this->shipping_method  = (isset($data['shipping_method'])) ? $data['shipping_method'] : null;


    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}