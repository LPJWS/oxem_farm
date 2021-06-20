<?php

class Cow extends Animal 
{
    public function __construct() 
    {   
        parent::__construct();
        $this->productionMin = 8;
        $this->productionMax = 12;
        $this->productionType = 'Milk';
    }
}