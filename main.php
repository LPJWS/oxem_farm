<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

function main() {
    $farm = new Farm();
    
    for ($i = 0; $i < 10; $i++) {
        $farm->addAnimal(new Cow());
    }
    for ($i = 0; $i < 20; $i++) {
        $farm->addAnimal(new Hen());
    }
    // $farm->addAnimal(34);

    $farm->collectAllProducton();

    foreach ($farm->getProduction() as $prod=>$value) {
        print($prod.': '.$value.PHP_EOL);
    }
}

main();