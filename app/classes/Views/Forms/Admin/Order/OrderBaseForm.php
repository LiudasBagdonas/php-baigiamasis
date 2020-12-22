<?php


namespace App\Views\Forms\Admin\Order;


use Core\Views\Form;

class OrderBaseForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'comment' => [
                    'label' => 'Enter your comment',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'value' => '',
                ]
            ]
        ]);
    }
}