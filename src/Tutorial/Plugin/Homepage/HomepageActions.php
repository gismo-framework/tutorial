<?php
    /**
     * Created by PhpStorm.
     * User: matthes
     * Date: 12.08.16
     * Time: 12:37
     */

    namespace Gismo\Tutorial\Plugin\Homepage;
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
         *
         * @Route(route="")
         * @return wurst
         */
        public function homeAction () {

        }

    }
