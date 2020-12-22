<?php


namespace App\Views\Forms\Common\Comments;


use Core\Views\Form;

class CommentBaseForm extends Form
{
    public function __construct()
    {
        parent::__construct([

            'fields' => [
                'comment' => [
                    'label' => 'Enter your comment',
                    'type' => 'textarea',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_length_500'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Leave your comment...',
                            'class' => 'field-textarea'
                        ],
                    ],
                ]
            ]
        ]);
    }
}