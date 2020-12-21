<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'user_name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_name_symbols',
                        'validate_length'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your full name',
                        ]
                    ]
                ],
                'user_surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_name_symbols',
                        'validate_length'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your full surname',
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_user_unique',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter email',
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter password',
                         ]
                    ]
                ],
                'password_repeat' => [
                    'label' => 'Password Repeat',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Repeat password',
                        ]
                    ]
                ],
                'phone' => [
                    'label' => 'Phone number',
                    'type' => 'phone',
                    'validators' => [
                        'validate_phone_not_required'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter phone number',
                        ]
                    ]
                ],
                'address' => [
                    'label' => 'Address',
                    'type' => 'text',
                    'validators' => [
                        'validate_address_not_required'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter address',
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'register' => [
                    'title' => 'Register',
                ]
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ]
        ]
    );

    }
}