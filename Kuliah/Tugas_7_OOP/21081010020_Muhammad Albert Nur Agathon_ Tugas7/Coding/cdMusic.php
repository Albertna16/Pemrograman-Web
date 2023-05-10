<?php
require_once('product.php');

class CDMusic extends Product{
    private $artist;
    private $genre;

    public function getArtist(){
        return $this->artist;
    }

    public function setArtist($artist){
        $this->artist = $artist;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function setGenre($genre){
        $this->genre = $genre;
    }

    public function musicPrice(){
        return $this->price + ($this->price * 10 / 100);
    }

    public function musicDiscount(){
        return $this->discount + 5;
    }

    public function resultPrice(){
        $resultPrice = $this->musicPrice() - ($this->musicPrice() * $this->musicDiscount() / 100);
        return $resultPrice;
    }
}