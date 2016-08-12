<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.08.16
 * Time: 01:26
 */

namespace Gismo\Tutorial\Plugin\CustomerCenter;


use Gismo\Tutorial\Context\Shop\ShopContext;

class CustomerCenterCtrl
{

    /**
     * @Filter("layout.mainLayout.headNavigation")
     */
    public function registerToCustomerCenterButton($§§value) {
        $§§value[-999] = function (ShopContext $context) {
            $action = $context["action.customerCenter.start"];
            if ($action->granted()) {
                return new Html("<a href='{$action->link()}'>Zum Kundencenter</a>");
            }
        };
    }


    /**
     * @Action(bind="action.customerCenter.start")
     * @Requires(permission="accessCustomerCenter")
     * @Route("/customer")
     */
    public function startAction(ShopContext $app) {


        return $app["page.customerCenter.mainPage"](["content" => $app["page.customerCenter.mainPage.overview"]()]);
    }


}