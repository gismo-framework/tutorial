<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 12.08.16
     * Time: 12:37
     */

    namespace Gismo\Tutorial\Plugin\Homepage;
    use Gismo\Component\Application\Context;
    use Gismo\Component\Route\Annotation\Mount;
    use Gismo\Component\Route\Annotation\Route;


    /**
     * Class HomepageActions
     * @package Gismo\Tutorial\Plugin\Homepage
     *
     *
     * @Mount("/some/where")
     */
    class HomepageActions {





        /**
         * Register a Api
         *
         * @Api(bind="api.shop.article.get")
         */
        public function getArticleData($sku) {

        }


        /**
         *
         * @Action
         * @Route(route="/api/shop.article.get/:sku")
         * @return wurst
         */
        public function homeAction (Context $context, $sku) {
            $context["api.shop.article.get"](["sku" => $sku]);
        }

    }
