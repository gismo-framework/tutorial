<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 11.08.16
 * Time: 21:10
 */

    namespace Gismo\Tutorial\Plugin\Homepage;

    use Gismo\Component\Application\Context;
    use Gismo\Component\Plugin\Plugin;
    use Gismo\Tutorial\Context\Frontend\FrontendContext;

    class HomepagePlugin implements Plugin {

        public function onContextInit(Context $context)
        {
            if ($context instanceof FrontendContext) {
                $context->route->add("/", function () {
                    echo "Hallo Welt";
                });
            }
        }
    }
