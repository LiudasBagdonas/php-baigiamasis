<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Common\Comments\CommentForm;
use Core\Api\Response;
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
//        $user = App::$session->getUser();
//        $form = [
//            'comment' => (new CommentForm())->render()
//        ];
//        $link = new Link([
//            'text' => 'Want to leave a Comment?',
//            'register' =>' Register!',
//            'url' => App::$router::getUrl('register')
//        ]);
//
        if (App::$session->getUser()) {
            $form = [
                'comment' => (new CommentForm())->render()
            ];
            $content = (new View([
                'headers' => [
                    'Name',
                    'Comment',
                    'Date'
                ],
                'form' => $form,
                'title' => 'Comments'
            ]))->render(ROOT . '/app/templates/content/table.tpl.php');
        } else {
            $link = new Link([
                'text' => 'Want to leave a Comment? ',
                'url' => App::$router::getUrl('register'),
                'redirect' => 'Register!'
            ]);

            $content = (new View([
                'headers' => [
                    'Name',
                    'Comment',
                    'Date'
                ],
                'link' => $link->render(),
                'title' => 'Comments'
            ]))->render(ROOT . '/app/templates/content/table.tpl.php');
        }
//        $content = (new View([
//            'headers' => [
//                'Name',
//                'Comment',
//                'Date'
//            ],
//            'form' => $form,
//            'user' => $user,
//            'title' => 'Comments'
//        ]))->render(ROOT . '/app/templates/content/table.tpl.php');

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

            $data = [];
            $data['user'] = $post['user'];
            $data['comment'] = $post['comment'];
            $data['timestamp'] = date('Y:m:d H:i:s', $post['timestamp']);
            $data['id'] = $post['id'];

            // Setting "what" to json-encode
            $response->setData($data);
        } else {
            $response->setErrors($form->getErrors());
        }
        return $response->toJson();
    }

    public function get()
    {
        $response = new Response();
        $comments = App::$db->getRowsWhere('comments');

        $data = [];
        foreach ($comments as $comment_index => $comment) {
            $data[$comment_index]['user'] = $comment['user'];
            $data[$comment_index]['comment'] = $comment['comment'];
            $data[$comment_index]['timestamp'] = date('Y:m:d H:i:s', $comment['timestamp']);
            $data[$comment_index]['id'] = $comment['id'];
        }

        $response->setData($data);
        return $response->toJson();
    }
}