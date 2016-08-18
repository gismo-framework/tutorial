<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 18.08.16
 * Time: 23:38
 */

    namespace Gismo\Tutorial\App;


    use Gismo\Component\HttpFoundation\Request\Request;
    use Gismo\Component\Plugin\App;

    class TutorialApp implements App  {


        public function run(Request $request)
        {
            $context = new \Gismo\Tutorial\Context\Frontend\FrontendContext();

            $plugin = new \Gismo\Tutorial\Plugin\Homepage\HomepagePlugin();
            $plugin->onContextInit($context);


            $plugin = new \Gismo\Tutorial\Plugin\Guestbook\GuestbookPlugin();
            $plugin->onContextInit($context);


            $request = \Gismo\Component\HttpFoundation\Request\RequestFactory::BuildFromEnv();
            $routeRequest = \Gismo\Component\Route\Type\RouterRequest::BuildFromRequest($request);


            $context->route->dispatch($routeRequest);
        }
    }