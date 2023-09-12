<?php

class Marka{
    private $id;
    private $naziv;
    private $drzava;

    public function __construct($id, $naziv, $drzava) {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->drzava = $drzava;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function getDrzava() {
        return $this->drzava;
    }
}
