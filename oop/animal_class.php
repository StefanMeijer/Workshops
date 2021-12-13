<?php
class animal {
    private $huidsType;
    private $poten;
    private $kleur;
    private $soort;
    private $verblijf;
    private $geluid;

    function __construct($huidsType, $poten, $kleur, $soort, $verblijf, $geluid)
    {
        $this->huidsType    = $huidsType;
        $this->poten        = $poten;
        $this->kleur        = $kleur;
        $this->soort        = $soort;
        $this->verblijf     = $verblijf;
        $this->geluid       = $geluid;
    }

    public function animalSound() {
        return $this->geluid;
    }
}