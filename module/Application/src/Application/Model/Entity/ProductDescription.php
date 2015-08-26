<?php 
namespace Application\Model\Entity;

class ProductDescription
{
    private $product_description_id;    
    private $description;
    // Add Tables
    private $product;
    function getProduct_description_id() {
        return $this->product_description_id;
    }

    function getDescription() {
        return $this->description;
    }

    function getProduct() {
        return $this->product;
    }

    function setProduct_description_id($product_description_id) {
        $this->product_description_id = $product_description_id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    
    public function exchangeArray($data=NULL)
    {
        $this->product_description_id = (isset($data['product_description_id'])) ? $data['product_description_id'] : null;
        $this->description  = (isset($data['description'])) ? $data['description'] : null;
        $this->product = (isset($data['product'])) ? $data['product'] : null;
    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}