<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 21:14
 */

namespace Gismo\Tutorial\Plugin\ShoppingCartPlugin\Api\Type;


class AddToCartMessage
{
    public $sku;
    public $quantity = 1;
    public $flags = null;
}