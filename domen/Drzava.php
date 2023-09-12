<?php

class Drzava {
    private $id;
    private $naziv;

    public function __construct($id, $naziv) {
        $this->id = $id;
        $this->naziv = $naziv;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }
}