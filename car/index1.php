<?php

interface EngineInterface {
    public function on();
    public function off();
}

class Car {
    private $color;
    private $year;
    private $manufacturer;
    private $engine;

    public function __construct($color, $year,$manufacturer, EngineInterface $engine)
    {
        $this->color = $color;
        $this->year = $year;
        $this->manufacturer = $manufacturer;
        $this->engine = $engine;
    }

    public function startEngine() {
        $this->engine->on();
    }

    public function endEngine() {
        $this->engine->off();
    }
}

class Engine implements EngineInterface {
    public function on() {
        return 'You started engine of your car';
    }

    public function off() {
        return 'You ended engine of your car';
    }
}

class AnotherEngine implements EngineInterface {
    public function on() {
        return 'You started engine of your car';
    }

    public function off() {
        return 'You ended engine of your car';
    }
}

$engine = new Engine();
$anotherEngine = new AnotherEngine();
$car = new Car('red', 1986, 'Ferrari', $anotherEngine);

var_dump($car);