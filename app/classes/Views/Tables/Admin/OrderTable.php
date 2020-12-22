<?php


namespace App\Views\Tables\Admin;

use App\Views\Table;

class OrderTable extends Table
{
    public function __construct()
    {
        parent::__construct([
            'headers' => [
                'Name',
                'Comment',
                'Date'
            ]
        ]);
    }

}