<?php
/**
 * Created by PhpStorm.
 * User: eldarseytablaev
 * Date: 31/8/2017
 * Time: 17:52
 */




/** Single responsibility - Принцип единственной ответственности. */




/** ------------ Принцип единственной ответственности НАРУШЕН :(  -------------- */

/**
 * Class OrderCommon
 * Класс работает с заказами, с хранилищем данных и отображением заказов
 */
class OrderCommon
{
    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}

    public function printOrder(){/*...*/}
    public function showOrder(){/*...*/}

    public function load(){/*...*/}
    public function save(){/*...*/}
    public function update(){/*...*/}
    public function delete(){/*...*/}
}



/** ------------ Принцип единственной ответственности СОБЛЮДАЕТСЯ :)  -------------------- */

/**
 * Class Order
 * Класс работает с заказом
 */
class Order
{
    public function calculateTotalSum(){/*...*/}
    public function getItems(){/*...*/}
    public function getItemCount(){/*...*/}
    public function addItem($item){/*...*/}
    public function deleteItem($item){/*...*/}
}

/**
 * Class OrderRepository
 * Класс работает с хранилищем данных
 */
class OrderRepository
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

/**
 * Class OrderViewer
 * Класс работает с отображением заказа
 */
class OrderViewer
{
    public function printOrder($order){/*...*/}
    public function showOrder($order){/*...*/}
}

