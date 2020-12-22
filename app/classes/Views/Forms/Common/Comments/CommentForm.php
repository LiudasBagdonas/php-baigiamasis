<?php


namespace App\Views\Forms\Common\Comments;


class CommentForm extends CommentBaseForm
{
    public function __construct() {
        parent::__construct();

        $this->data['attr']['id'] = 'comment-form';
        $this->data['attr']['method'] = 'POST';
        $this->data['buttons']['comment'] = [
            'title' => 'Comment',
        ];
    }
}