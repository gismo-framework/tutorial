<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 20:09
 */

namespace Gismo\Tutorial\ShoppingCartPlugin\Api;


use Gismo\Component\Di\Ex\NoFactoryException;
use Gismo\Tutorial\Plugin\ShoppingCartPlugin\Api\Type\AddToCartMessage;

class ShoppingCartApi
{


    /**
     * @Api(bind="api.cart.show")
     * @AllowAll
     */
    public function listShoppingCart(ShopContext $context, SimpleList $§shoppingCartList, $detailLevel="normal") {
        $ret = [
            "mustReloadPrice" => false,
            "errors" => []
        ];

        $totalPrice = 0.;
        $totalItems = 0;
        $totalPositions = 0;
        foreach ($§shoppingCartList as $curItem) {
            $totalPositions++;
            if ($detailLevel > 0) {
                try {
                    $curItem->productData = $context["api.product.info"](["sku" => $curItem->sku, "detailLevel" => $detailLevel]);
                } catch (NoDataException $e) {
                    continue; // Skip
                }
            }

            $ret[] = $curItem;
        }
        return $ret;

    }


    /**
     *
     * @Api(bind="api.cart.change")
     *
     *
     * @param ShopContext $context
     * @param SimpleList $§shoppingCartList
     * @param AddToCartMessage $itemData
     *
     * @return bool
     */
    public function addToCart (ShopContext $context, SimpleList $§shoppingCartList, T_AddToCartMessage $itemData) {
        // Find item and update / create / delete it
        return true;
    }

}