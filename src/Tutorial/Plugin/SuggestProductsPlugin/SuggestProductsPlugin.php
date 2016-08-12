<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 22:34
 */

namespace Gismo\Tutorial\Plugin\SuggestProductsPlugin;


use Gismo\Component\Application\Context;
use Gismo\Component\Plugin\Plugin;
use Gismo\Tutorial\Context\Shop\ShopContext;
use Gismo\Tutorial\Plugin\ShoppingCartPlugin\Api\Type\AddToCartMessage;

class SuggestProductsPlugin implements Plugin
{


    public function onContextInit(Context $context)
    {
        if ($context instanceof ShopContext) {

            $context->on("event.shop.cart.itemAdd", function (SessionFlash $flash, AddToCartMessage $§§eventData) {
                $flash->put("lastAddToCartSku", $§§eventData->sku);
            });

            // Shortcut for:

            $context["event.shop.cart.itemAdd"] = $context->filter(function ($§§value, $§§prio) {
                $§§value[$§§prio] = function ($§§eventData) {
                    $flash->put("lastAddToCartSku", $§§eventData->sku);
                };
            });

            $context["partial.shop.product.regionD"]
                = $context["partial.shop.productDetails.regionA"]
                = $context->filter(
                    function (Partial $partial, Flash $flash, Context $context) {
                        if ($flash->has("lastAddtoCartSku")) {
                            $partial[] = new HtmlSection("Sie haben eben ein Produkt gekauft! <a href='{$context->link("/cart")}'>Weiter zum Warenkorb</a>");
                        }
                    }
            );
        }
    }
}