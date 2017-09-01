<?php
/**
 * Created by PhpStorm.
 * User: eldarseytablaev
 * Date: 31/8/2017
 * Time: 22:12
 */




/** Liskov substitution - Принцип подстановки Барбары Лисков */




/**
 * Реально используемый в коде класс
 */
class Bird {
    public function fly() {
        $flySpeed = 10;
        return $flySpeed;
    }
}

/**
 * Дочерний класс от Bird.
 * Не изменяет поведение, но дополняет.
 * Не нарушает принцип LSP
 */
class Duck extends Bird {

    public function fly() {
        $flySpeed = 8;
        return $flySpeed;
    }

    public function swim() {
        $swimSpeed = 2;
        return $swimSpeed;
    }
}

/**
 * Дочерний класс от Bird.
 * Изменяет поведение.
 * Нарушает принцип LSP
 */
class Penguin extends Bird {

    public function fly() {
        //die('i can`t fly (((');  // не типичное поведение - die или exception
        return 'i can`t fly ((('; // не типичное поведение - возвращаем string, а не integer
    }

    public function swim() {
        $swimSpeed = 4;
        return $swimSpeed;
    }
}

/**
 * Class BirdRun
 */
class BirdRun {
    /** @var Bird */
    private $bird;

    public function __construct(Bird $bird) {
        $this->bird = $bird;
    }

    public function run() {
        $flySpeed = $this->bird->fly();
    }
}

$bird = new Bird();
//$bird = new Duck(); // код будет работать как и прежде - принцип LSP СОБЛЮДАЕТСЯ :)
//$bird = new Penguin(); // код меняет свое поведение, следовательно в данном случае принцип LSP НАРУШЕН :(
$birdRun = new BirdRun($bird);
$birdRun->run();

/**
 *
 * После замены использования Bird на Duck код будет работать как и прежде - принцип LSP соблюден.
 * После замены Bird на Penguin код меняет свое поведение, следовательно в данном случае принцип LSP нарушен.
 * Следовать этому типу очень важно при проектировании новых типов с использованием наследования.
 * Этот принцип предупреждает о том, что изменение унаследованного производным типом поведения очень рискованно.
 *
 */
