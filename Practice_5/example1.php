<?php
// Базовий клас
class Airplane {
    public $model;
    private $speed;

    public function __construct($model, $speed) {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function fly() {
        echo "Літак {$this->model} летить зі швидкістю {$this->speed} км/год.<br>";
    }
}

// Наслідуваний клас
class MilitaryPlane extends Airplane {
    public $weapon;

    public function __construct($model, $speed, $weapon) {
        parent::__construct($model, $speed);
        $this->weapon = $weapon;
    }

    public function attack() {
        echo "Атака з {$this->weapon}!<br>";
    }
}

// Створення об'єктів
$plane1 = new Airplane("Boeing 737", 850);
$plane1->fly();

$jet = new MilitaryPlane("F-16", 1500, "ракети");
$jet->fly();
$jet->attack();
?>
