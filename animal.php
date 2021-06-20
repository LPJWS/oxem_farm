<?php

class Animal 
{
    protected string $id;
    protected int $productionMin;
    protected int $productionMax;
    protected string $productionType;
    
    public function __construct()
    {
        $this->id = generateId();
    }

    public function collectProduction(): int
    {
        return random_int($this->productionMin, $this->productionMax);
    }

    public function getProductionType(): string
    {
        return $this->productionType;
    }

}