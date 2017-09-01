<?php
/**
 * Created by PhpStorm.
 * User: eldarseytablaev
 * Date: 1/9/2017
 * Time: 10:14
 */




/** Interface segregation - Принцип разделения интерфейса */



/** ------------ Принцип разделения интерфейса НАРУШЕН :(  -------------- */

/**
 * Interface IProductCommon
 * Данный интефейс плох тем, что он включает слишком много методов
 * А что, если наш класс товаров не может иметь скидок или промокодов,
 * либо для него нет смысла устанавливать материал из которого сделан (например, для книг).
 */
interface IProductCommon
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);

    public function setColor($color);
    public function setSize($size);

    public function setCondition($condition);
    public function setPrice($price);
}


/** ------------ Принцип разделения интерфейса СОБЛЮДАЕТСЯ :)  -------------- */

/**
 * Interface IProduct
 */
interface IProduct
{
    public function setCondition($condition);
    public function setPrice($price);
}

/**
 * Interface IClothes
 */
interface IClothes
{
    public function setColor($color);
    public function setSize($size);
    public function setMaterial($material);
}

/**
 * Interface IDiscountable
 */
interface IDiscountable
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
}

/**
 * Class Book
 */
class Book implements IProduct, IDiscountable
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function applyDiscount($discount){/*...*/}
    public function applyPromocode($promocode){/*...*/}
}

/**
 * Class KidsClothes
 */
class KidsClothes implements IProduct, IClothes
{
    public function setCondition($condition){/*...*/}
    public function setPrice($price){/*...*/}
    public function setColor($color){/*...*/}
    public function setSize($size){/*...*/}
    public function setMaterial($material){/*...*/}
}