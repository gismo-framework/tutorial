<?php


    class GuestbookPlugin extends Plugin {


        public function onContextInit(Context $c) {
            if ($c instanceof FrontendContext) {
                $c->api->GET("/api/guestbook", function () {

                })->bind("guestbook.list");

                $c->api->POST("/api/guestbook/{id}", function ($id, array $data) {

                })->bind("guestbook.change")->useBodyAsParameter("data");

                $c->api->PUT("/api/guestbook", function (array $data) {

                })->bind("guestbook.create")->useBodyAsParameter("data");

                $c->api->DELETE("/api/guestbook/{id}", function ($id) {

                })->bind("guestbook.delete");

                $c[MainNavigation::class] = $c->filter(function (MainNavigation $n) {
                    $n->addNav("Gästebuch", "/guestbook");
                });

                $c->route->add("/guestbook", function (MainPage $p) use ($c) {
                    $p->content = new TemplateSection($c->api["guestbook.list"]());
                    $p->render()->out();
                });
            }
        }


    }