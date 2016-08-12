<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 11.08.16
 * Time: 21:10
 */

    namespace Gismo\Tutorial\Plugin\Homepage;

    use Gismo\Component\Application\Context;
    use Gismo\Component\Partial\DefaultPartial\NavigationPartial;
    use Gismo\Component\Plugin\Plugin;
    use Gismo\Component\Template\GoTemplate;
    use Gismo\Component\Template\GoTemplateParser;
    use Gismo\Tutorial\Context\Frontend\FrontendContext;

    class HomepagePlugin implements Plugin {

        public function onContextInit(Context $context)
        {
            if ($context instanceof FrontendContext) {

                $context[NavigationPartial::class] = $context->filter(function (NavigationPartial $§§input) {

                    return $§§input;
                });


                $context->api["some.namespace.class.method"]->beforeCall[0] = function () {

                };


                $context->route->add("/", function (NavigationPartial $p) {

                    $p = new GoTemplate();
                    echo $p->renderHtmlFile(__DIR__ . "/tpl/homepage.tpl.html", ["title"=>"wurst"]);
                });
            }
        }
    }
