<?php

class Farm 
{
    private array $animals;
    private array $production;
    
    public function __construct()
    {
        $this->animals = array();
        $this->production = array();
    }
    
    public function addAnimal(Animal $animal): void
    {
        array_push($this->animals, $animal);
    }
    
    public function collectAllProducton(): void
    {
        $res = array();
        foreach ($this->animals as $animal) 
        {
            $apt = $animal->getProductionType();
            if (!array_key_exists($apt, $res)) 
            {
                $res[$apt] = 0;
            }
            $res[$apt] += $animal->collectProduction();
        }
        $this->production = $res;
    }

    public function getProduction(): array
    {
        return $this->production;
    }
}
