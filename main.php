<?php
class Farm {
    private $animals;
    private $production;
    
    public function __construct() {
        $this->animals = array();
        $this->production = array();
    }
    
    public function addAnimal($animal) {
        array_push($this->animals, $animal);
    }
    
    public function collectAllProducton() {
        $res = array();
        foreach ($this->animals as $animal) {
            $apt = $animal->getProductionType();
            if (!array_key_exists($apt, $res)) {
                $res[$apt] = 0;
            }
            $res[$apt] += $animal->collectProduction();
        }
        $this->production = $res;
    }

    public function getProduction() {
        return $this->production;
    }
}

class Animal {
    protected $id;
    protected $productionMin;
    protected $productionMax;
    protected $productionType;
    
    public function __construct() {
        $this->id = generateId();
    }

    public function collectProduction() {
        return random_int($this->productionMin, $this->productionMax);
    }

    public function getProductionType() {
        return $this->productionType;
    }

}

class Cow extends Animal {
    public function __construct() {   
        parent::__construct();
        $this->productionMin = 8;
        $this->productionMax = 12;
        $this->productionType = 'Milk';
    }
}

class Hen extends Animal {
    public function __construct() {   
        parent::__construct();
        $this->productionMin = 0;
        $this->productionMax = 1;
        $this->productionType = 'Eggs';
    }
}

function generateId() {
    return substr(str_shuffle(MD5(microtime())), 0, 10);
}

function main() {
    $farm = new Farm();
    
    for($i = 0; $i < 10; $i++) {
        $farm->addAnimal(new Cow());
    }
    for($i = 0; $i < 20; $i++) {
        $farm->addAnimal(new Hen());
    }

    $farm->collectAllProducton();

    foreach ($farm->getProduction() as $prod=>$value) {
        print($prod.': '.$value.PHP_EOL);
    }
}

main();
?>