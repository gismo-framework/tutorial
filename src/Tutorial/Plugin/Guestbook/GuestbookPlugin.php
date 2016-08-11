<?php


    namespace Gismo\Tutorial\Plugin\Guestbook;

    use Gismo\Component\Application\Context;
    use Gismo\Component\Plugin\Plugin;
    use Gismo\Tutorial\Context\Frontend\FrontendContext;

    class GuestbookPlugin implements Plugin
    {


        public function onContextInit(Context $c)
        {
            if ($c instanceof FrontendContext) {

            }
        }


    }