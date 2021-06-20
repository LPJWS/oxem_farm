<?php

class Hen extends Animal 
{
    public function __construct() {   
        parent::__construct();
        $this->productionMin = 0;
        $this->productionMax = 1;
        $this->productionType = 'Eggs';
    }
}