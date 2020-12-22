<?php


namespace App\Views\Forms\Admin\Order;


class CommentForm extends OrderBaseForm
{
    public function __construct() {
        parent::__construct();

        $this->data['attr']['id'] = 'comment-form';
        $this->data['attr']['method'] = 'POST';
        $this->data['buttons']['comment'] = [
            'title' => 'Comment',
        ];
//        $this->data['validators'] = [
//            'validate_not_logged_in'
//        ];
    }
}