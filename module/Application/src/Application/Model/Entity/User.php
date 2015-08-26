<?php 
namespace Application\Model\Entity;

class User
{
    private $user_id;
    private $user_name;
    private $name;
    private $last_name;
    private $type_id;
    private $id;
    private $phone_number;
    private $mobile_number;
    private $email;
    private $observation_id;
    private $user_direction_id;
    // Add Tables
    private $product;
    private $shipping;
    private $payment;

    function getUser_id() 
    {
        return $this->user_id;
    }

    function getUser_name() 
    {
        return $this->user_name;
    }

    function getName() 
    {
        return $this->name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getType_id() {
        return $this->type_id;
    }

    function getId() {
        return $this->id;
    }

    function getPhone_number() {
        return $this->phone_number;
    }

    function getMobile_number() {
        return $this->mobile_number;
    }

    function getEmail() {
        return $this->email;
    }

    function getObservation_id() {
        return $this->observation_id;
    }

    function getUser_direction_id() {
        return $this->user_direction_id;
    }

    function getProduct() {
        return $this->product;
    }

    function getShipping() {
        return $this->shipping;
    }

    function getPayment() {
        return $this->payment;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setType_id($type_id) {
        $this->type_id = $type_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPhone_number($phone_number) {
        $this->phone_number = $phone_number;
    }

    function setMobile_number($mobile_number) {
        $this->mobile_number = $mobile_number;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setObservation_id($observation_id) {
        $this->observation_id = $observation_id;
    }

    function setUser_direction_id($user_direction_id) {
        $this->user_direction_id = $user_direction_id;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setShipping($shipping) {
        $this->shipping = $shipping;
    }

    function setPayment($payment) {
        $this->payment = $payment;
    }

    
    public function exchangeArray($data=NULL)
    {
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->user_name     = (isset($data['user_name'])) ? $data['user_name'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->last_name  = (isset($data['last_name'])) ? $data['last_name'] : null;
        $this->type_id  = (isset($data['type_id'])) ? $data['type_id'] : null;
        $this->id  = (isset($data['id'])) ? $data['id'] : null;
        $this->phone_number  = (isset($data['phone_number'])) ? $data['phone_number'] : null;
        $this->mobile_number  = (isset($data['mobile_number'])) ? $data['mobile_number'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->product  = (isset($data['product'])) ? $data['product'] : null;
        $this->payment  = (isset($data['payment'])) ? $data['payment'] : null;
        $this->shipping  = (isset($data['shipping'])) ? $data['shipping'] : null;


    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}