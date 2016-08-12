<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 20:05
 */

namespace Gismo\Tutorial\ShoppingCartPlugin;


use Gismo\Component\Application\Context;
use Gismo\Component\Plugin\Plugin;
use Gismo\Tutorial\ShoppingCartPlugin\Api\ShoppingCartApi;
use Gismo\Tutorial\ShoppingCartPlugin\Ctrl\BuyButtonCtrl;
use Gismo\Tutorial\ShoppingCartPlugin\Ctrl\CartCtrl;
use Gismo\Tutorial\ShoppingCartPlugin\Ctrl\CartPluginCtrl;

class ShoppingCartPlugin implements Plugin
{


    public function onContextInit(Context $context)
    {
        if ($context instanceof ShopContext) {

            // Stellt unter dem Parameter eine SimpleList zur Verfügung
            $context["§shoppingCartList"] = $context->service(
                function (Session $session) {
                    return $session->provide("shoppingCart", function () {
                         return new SimpleList([]);
                    });
                }
            );

            $context
                ->with(new ShoppingCartApi())
                ->with(new BuyButtonCtrl())
                ->with(new CartCtrl())
                ->with(new CartPluginCtrl());

        }
    }
}