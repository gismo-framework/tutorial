<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 12.08.16
 * Time: 22:58
 */

namespace Gismo\Tutorial\Plugin\LoginPlugin\Ctrl;


use Gismo\Component\Form\FormData;
use Gismo\Component\Form\FormHandler;

class LoginCtrl
{


    /**
     * @Factory("page.loginPage")
     */
    public function loginPageFactory() {

    }


    /**
     * @Action(bind="action.login")
     * @AllowAll
     * @Route("/login/:originalUrl")
     */
    public function loginAction (ShopContext $context, $originalUrl=null) {
        $form = $context["form.login"];
        $form["method"] = "POST";

        $formBuilder = $context->form->formBuilder();

        $form[10] = $formBuilder
                    ->header(["Please Login"])
                    ->row()->label("User")->input(["type"=>"text", "name"=>"user"])->end();
        $form[0] = $formBuilder
                    ->row()->label("Pass")->input(["type"=>"password", "name"=>"pass"])->end();

        $form[-999] = $formBuilder
                    ->row()->input(["type"=>"submit", "name"=>"senden", "value"=>"Login"])->end();

        $form[] = new class implements FormHandler  {

            public function load(FormData $data)
            {
                return [];
            }

            public function validate(FormData $data)
            {
                $data["user"]->invalid(["EN:User not existing"]);
            }

            public function store(FormData $data)
            {
                // TODO: Implement store() method.
            }
        };

        $page = $context["page.login"];
        $page["content"] = $form;
        return $page(); // <- () will execute the Page and with it the Form.
    }

}