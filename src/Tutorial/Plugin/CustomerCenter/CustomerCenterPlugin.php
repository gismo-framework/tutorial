<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.08.16
 * Time: 00:07
 */

namespace Gismo\Tutorial\Plugin\CustomerCenter;


use Gismo\Component\Application\Context;
use Gismo\Component\Plugin\Plugin;
use Gismo\Tutorial\Context\Shop\ShopContext;

class CustomerCenterPlugin implements Plugin
{

    public function onContextInit(Context $context)
    {
        if ($context instanceof ShopContext) {

            $context["page.customerCenter"] = $context->factory(function () use ($context) {
                $page = new Partial($context);
                $page->useTemplate("CustomerCenter.tpl.html");
                $page->afterRender(function ($§§output) use ($context) {
                    return $context["layout.mainPage"](["content" => $§§output]);
                });
            });

        }
    }
}