<?php
/**
 * Created by PhpStorm.
 * User: eldarseytablaev
 * Date: 31/8/2017
 * Time: 18:38
 */

/**
 *
 * Open-closed - Принцип открытости/закрытости
 *
 */




/** ------------ Принцип открытости/закрытости НАРУШЕН :(  -------------- */

/**
 * Class OrderRepositoryDb
 * Класс жостко используе хранилище MySQL
 */
class OrderRepositoryDb
{
    public function load($orderID)
    {
        $pdo = new PDO($this->config->getDsn(), $this->config->getDBUser(), $this->config->getDBPassword());
        $statement = $pdo->prepare('SELECT * FROM `orders` WHERE id=:id');
        $statement->execute(array(':id' => $orderID));
        return $statement->fetchObject('Order');
    }
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}



/** ------------ Принцип открытости/закрытости СОБЛЮДАЕТСЯ :) -------------------- */

/**
 * Class OrderRepository
 *
 * С помощью такого подхода мы можем использоавать любую базу данных, не меняя их исходный код
 */
class OrderRepository
{
    /** @var IOrderSource */
    private $source;

    /**
     * Объект одного из классов: MySQLOrderSource | ApiOrderSource
     * @param IOrderSource $source
     */
    public function setSource(IOrderSource $source)
    {
        $this->source = $source;
    }

    public function load($orderID)
    {
        return $this->source->load($orderID);
    }
    public function save($order){/*...*/}
    public function update($order){/*...*/}
}

/**
 * Interface IOrderSource
 * Интерфейс для реализации использования любой базы данны
 */
interface IOrderSource
{
    public function load($orderID);
    public function save($order);
    public function update($order);
    public function delete($order);
}

/**
 * Class MySQLOrderSource
 * Реализует итрерфейс IOrderSource
 */
class MySQLOrderSource implements IOrderSource
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}

/**
 * Class ApiOrderSource
 * Реализует итрерфейс IOrderSource
 */
class ApiOrderSource implements IOrderSource
{
    public function load($orderID){/*...*/}
    public function save($order){/*...*/}
    public function update($order){/*...*/}
    public function delete($order){/*...*/}
}