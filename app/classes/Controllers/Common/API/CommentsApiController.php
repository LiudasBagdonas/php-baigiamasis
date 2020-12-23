<?php


namespace App\Controllers\Common\API;


use App\App;
use App\Views\Forms\Common\Comments\CommentForm;
use Core\Api\Response;

class CommentsApiController
{
    /**
     * Method returns all comments
     * @return string
     */
    public function index()
    {
        $response = new Response();

        $user_row = App::$session->getUser();
        $users = App::$db->getRowsWhere('users');
        $form = new CommentForm();
        $post = [];

        if ($form->validate()) {
            $form_values = $form->values();
            foreach ($users as $user_index => $user) {
                if ($user_row == $user) {
                    $post = [
                        'user_id' => $user_index,
                        'timestamp' => time(),
                        'comment' => $form_values['comment'],
                        'id' => uniqid()
                    ];

                }
            }
            App::$db->insertRow('comments', $post);

            $data = [];
            $data['user_id'] = App::$db->getRowById('users', $post['user_id'])['user_name'];
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

    /**
     * Method returns newly added comment
     * @return string
     */
    public function addComment()
    {
        $response = new Response();
        $comments = App::$db->getRowsWhere('comments');

        $data = [];
        foreach ($comments as $comment_index => $comment) {
            $data[$comment_index]['user_id'] = App::$db->getRowById('users', $comment['user_id'])['user_name'];
            $data[$comment_index]['comment'] = $comment['comment'];
            $data[$comment_index]['timestamp'] = date('Y:m:d H:i:s', $comment['timestamp']);
            $data[$comment_index]['id'] = $comment['id'];
        }

        $response->setData($data);
        return $response->toJson();
    }
}