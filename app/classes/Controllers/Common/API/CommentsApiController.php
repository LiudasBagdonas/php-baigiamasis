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
            $data[$comment_index]['user'] = $comment['user'];
            $data[$comment_index]['comment'] = $comment['comment'];
            $data[$comment_index]['timestamp'] = date('Y:m:d H:i:s', $comment['timestamp']);
            $data[$comment_index]['id'] = $comment['id'];
        }

        $response->setData($data);
        return $response->toJson();
    }
}