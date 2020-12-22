<?php

namespace App\Controllers\Common;

use App\Abstracts\Controller;
use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\Pizza\PizzaCreateForm;
use App\Views\Forms\Admin\Pizza\PizzaUpdateForm;
use App\Views\Forms\Admin\PizzaDeleteForm;
use App\Views\Forms\Admin\OrderCreateForm;
use Core\View;
use App\Views\Content\HomeContent;
use Core\Views\Link;
use App\Views\Footer;

class HomeController
{
    protected $page;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'Welcome',
            'js' => ['/media/js/home.js']
        ]);
    }

    /**
     * Home Controller Index
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string
    {

        $content = (new View([

        ]))->render(ROOT . '/app/templates/content/index.tpl.php');
        $this->page->setContent($content);

        return $this->page->render();
    }
}

