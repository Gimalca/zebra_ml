<?php 
namespace Application\Model\Entity;

class Payment
{
    private $payment_id;
    private $transfer_number;
    private $date;
    // Add Tables
    private $bank_transmitter_method;
    private $bank_receiver;
    private $bank_transmitter;
    function getPayment_id() {
        return $this->payment_id;
    }

    function getTransfer_number() {
        return $this->transfer_number;
    }

    function getDate() {
        return $this->date;
    }

    function getBank_transmitter_method() {
        return $this->bank_transmitter_method;
    }

    function getBank_receiver() {
        return $this->bank_receiver;
    }

    function getBank_transmitter() {
        return $this->bank_transmitter;
    }
    function setPayment_id($payment_id) {
        $this->payment_id = $payment_id;
    }

    function setTransfer_number($transfer_number) {
        $this->transfer_number = $transfer_number;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setBank_transmitter_method($bank_transmitter_method) {
        $this->bank_transmitter_method = $bank_transmitter_method;
    }

    function setBank_receiver($bank_receiver) {
        $this->bank_receiver = $bank_receiver;
    }

    function setBank_transmitter($bank_transmitter) {
        $this->bank_transmitter = $bank_transmitter;
    }

        
    public function exchangeArray($data=NULL)
    {
        $this->payment_id = (isset($data['payment_id'])) ? $data['payment_id'] : null;
        $this->transfer_number     = (isset($data['transfer_number'])) ? $data['transfer_number'] : null;
        $this->date = (isset($data['date'])) ? $data['date'] : null;
        $this->bank_transmitter_method  = (isset($data['bank_transmitter_method'])) ? $data['bank_transmitter_method'] : null;
        $this->bank_transmitter  = (isset($data['bank_transmitter'])) ? $data['bank_transmitter'] : null;
        $this->bank_receiver  = (isset($data['bank_receiver'])) ? $data['bank_receiver'] : null;


    }
    public function getArrayCopy() {
        return get_object_vars($this);
    }
}