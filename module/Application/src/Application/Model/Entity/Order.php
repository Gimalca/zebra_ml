<?php 
namespace Application\Model\Entity;

class Order
{
    private $order_id;
    private $price;
    // Add Tables
    private $payment;
    private $product;
    private $shipping;
    function getOrder_id() {
        return $this->order_id;
    }

    function getPrice() {
        return $this->price;
    }

    function getPayment() {
        return $this->payment;
    }

    function getProduct() {
        return $this->product;
    }

    function getShipping() {
        return $this->shipping;
    }

    function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setPayment($payment) {
        $this->payment = $payment;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setShipping($shipping) {
        $this->shipping = $shipping;
    }

    
    public function exchangeArray($data=NULL)
    {
        $this->order_id = (isset($data['order_id'])) ? $data['order_id'] : null;
        $this->price = (isset($data['price'])) ? $data['price'] : null;
        $this->payment = (isset($data['payment'])) ? $data['payment'] : null;
        $this->product  = (isset($data['product'])) ? $data['product'] : null;
        $this->shipping  = (isset($data['shipping'])) ? $data['shipping'] : null;
    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}