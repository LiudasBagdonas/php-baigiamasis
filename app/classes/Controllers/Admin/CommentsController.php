<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AdminController;
use App\Views\BasePage;
use App\Views\Forms\Admin\Order\CommentForm;
use App\Views\Tables\Admin\OrderTable;
use Core\Api\Response;
use Core\View;

/**
 * Class AdminOrders
 *
 * @package App\Controllers\Admin
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
class CommentsController
//    extends AdminController
{
    protected BasePage $page;
    protected CommentForm $form;

    public function __construct()
    {
//        parent::__construct();
        $this->page = new BasePage([
            'title' => 'About Us',
            'js' => ['/media/js/admin/orders.js']

        ]);
    }

    public function index()
    {
        $form = [
            'comment' => (new CommentForm())->render()
        ];
        $table = [
            'headers' => (new OrderTable())->render()
        ];
        $content = (new View([
            'headers' => [
                'Name',
                'Comment',
                'Date'
            ],
            'form' => $form
        ]))->render(ROOT . '/app/templates/content/table.tpl.php');

        $this->page->setContent($content);
        return $this->page->render();
    }

    public function create()
    {
        $response = new Response();

        $user = App::$session->getUser();
        $form = new CommentForm();

        if ($form->validate()) {
            $form_values = $form->values();
            $post = [
                'user' => $user['user_name'],
                'timestamp' => time(),
                'comment' => $form_values['comment'],
                'id' => uniqid()
            ];

            App::$db->insertRow('comments', $post);
            $comment = App::$db->getRowWhere('comments');


            // Setting "what" to json-encode
            $response->setData($comment);
        } else {
            $response->setErrors($form->getErrors());
        }
        return $response->toJson();
    }

    public function get()
    {
        $response = new Response();
        $comments = App::$db->getRowsWhere('comments');

        $response->setData($comments);
        return $response->toJson();
    }
}