<?php
require_once('product.php');

class CDCabinet extends Product{
    private $capacity;
    private $model;

    public function getCapacity(){
        return $this->capacity;
    }

    public function setCapacity($capacity){
        $this->capacity = $capacity;
    }

    public function getModel(){
        return $this->model;
    }

    public function setModel($model){
        $this->model = $model;
    }

    public function cabinetPrice(){
        return $this->price + ($this->price * 15 / 100);
    }

    public function resultPrice(){
        $result = $this->cabinetPrice() - ($this->cabinetPrice() * $this->getDiscount() / 100);
        return $result;
    }
}