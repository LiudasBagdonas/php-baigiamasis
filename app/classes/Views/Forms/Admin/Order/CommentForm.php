<?php


namespace App\Views\Forms\Admin\Order;


class CommentForm extends OrderBaseForm
{
    public function __construct() {
        parent::__construct();

        $this->data['attr']['id'] = 'comment-form';
        $this->data['buttons']['comment'] = [
            'title' => 'Comment',
        ];
    }
}