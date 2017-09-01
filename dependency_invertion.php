<?php
/**
 * Created by PhpStorm.
 * User: eldarseytablaev
 * Date: 1/9/2017
 * Time: 11:03
 */




/** Dependency Invertion - Принцип инверсии зависимостей */


/** ------------ Принцип инверсии зависимостей НАРУШЕН :(  -------------- */

class Customer
{
    private $currentOrder = null;

    public function buyItems()
    {
        if(is_null($this->currentOrder)){
            return false;
        }

        // Принцип инверсии зависимостей НАРУШЕН :(
        $processor = new OrderProcessor();
        return $processor->checkout($this->currentOrder);
    }
}

class OrderProcessor
{
    public function checkout($order)
    {
        return $order;
    }
}


/** ------------ Принцип инверсии зависимостей СОБЛЮДАЕТСЯ :)  -------------- */

class Customer2
{
    private $currentOrder = null;

    // Принцип инверсии зависимостей СОБЛЮДАЕТСЯ :)
    public function buyItems(IOrderProcessor $processor)
    {
        if(is_null($this->currentOrder)){
            return false;
        }
        return $processor->checkout($this->currentOrder);
    }
}

interface IOrderProcessor
{
    public function checkout($order);
}

class OrderProcessor2 implements IOrderProcessor
{
    public function checkout($order){/*...*/}
}