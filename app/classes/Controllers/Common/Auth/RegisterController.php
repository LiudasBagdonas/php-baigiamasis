<?php

namespace App\Controllers\Common\Auth;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Footer;
use App\Views\Forms\Common\Auth\RegisterForm;
use Core\View;

class RegisterController extends GuestController
{
    protected  RegisterForm $form;
    protected BasePage $page;
    protected Footer $footer;
    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForm();
        $this->footer = new Footer();
        $this->page = new BasePage([
            'title' => 'Register',
            'footer' => $this->footer->render()
        ]);
    }
    public function register()
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            unset($clean_inputs['password_repeat']);
            App::$db->insertRow('users', $clean_inputs + ['role' => 'user']);
            header('Location: /login');
        }
        $content = (new View([
            'title' => 'Register',
            'form' => $this->form->render(),
        ]))->render(ROOT . '/app/templates/content/forms.tpl.php');

        $this->page->setContent($content);
        return $this->page->render();
    }
}



