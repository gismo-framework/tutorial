<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 20:08
 */

namespace Gismo\Tutorial\ShoppingCartPlugin\Ctrl;


use Gismo\Tutorial\Context\Shop\ShopContext;
use Gismo\Tutorial\Plugin\ShoppingCartPlugin\Api\Type\AddToCartMessage;

class BuyButtonCtrl
{

    private $hasQuantitySelector = false;

    public function __construct($hasQuantitySelector)
    {
        $this->hasQuantitySelector = $hasQuantitySelector;
    }

    /**
     * @Filter("stamp.articleList")
     */
    public function addBuyNowButtonToArticleList(Stamp $articleList) {
        $articleList["addSection"] = function (Product $§§meta, ShopContext $context) {
            return "<form action='{$context["action.shop.cart.add"]->link($context->request->self)}'>
                        <input type='hidden' name='sku' value='{$§§meta->sku}'>
                        <input type='hidden' name='addQuantity' value='1'>
                        <button></button>
                    </form>";
        };
    }


    /**
     * @Action(bind="action.shop.cart.add")
     * @Route(route="/cart/add/:backlink" method="POST")
     *
     * @param null $backlink
     */
    public function addToCartFormAction (ShopContext $context, Request $form, Response $response, $backlink=null) {
        $context["api.cart.change"](["itemData" => $addToCartmessage = new AddToCartMessage($form->POST->sku, $form->POST->addQuantity)]);
        $context["event.shop.cart.itemAdd"]($addToCartmessage);
        return $response->redirect($backlink);
    }
}