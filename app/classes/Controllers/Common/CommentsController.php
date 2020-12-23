<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Common\Comments\CommentForm;
use Core\View;
use Core\Views\Link;

/**
 * Class AdminOrders
 *
 * @package App\Controllers\Admin
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
class CommentsController
{
    protected BasePage $page;
    protected CommentForm $form;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'About Us',
            'js' => ['/media/js/comments.js']

        ]);
    }

    public function index()
    {
        if (App::$session->getUser()) {
            $form = [
                'comment' => (new CommentForm())->render()
            ];
        } else {
            $link = (new Link([
                'text' => 'Want to leave a Comment? ',
                'url' => App::$router::getUrl('register'),
                'redirect' => 'Register!'
            ]))->render();
        }
        $content = (new View([
            'headers' => [
                'Name',
                'Comment',
                'Date'
            ],
            'form' => $form ?? [],
            'link' => $link ?? [],
            'title' => 'Comments'
        ]))->render(ROOT . '/app/templates/content/table.tpl.php');

        $this->page->setContent($content);
        return $this->page->render();
    }
}