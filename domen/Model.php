<?php
class Model {
    private $id;
    private $marka;
    private $naziv;
    private $tip;
    private $velicina;
    
    public function __construct($id, $marka, $naziv, $tip, $velicina) {
        $this->id = $id;
        $this->marka = $marka;
        $this->naziv = $naziv;
        $this->tip = $tip;
        $this->velicina = $velicina;
    }

    public function getId() {
        return $this->id;
    }

    public function getMarka() {
        return $this->marka;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function getTip() {
        return $this->tip;
    }

    public function getVelicina() {
        return $this->velicina;
    }
}
?>