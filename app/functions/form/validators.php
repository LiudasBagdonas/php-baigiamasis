<?php

use App\App;

/**
 *
 * Checks if user(data) already exists in our saved file.
 *
 * If there is no such data(user) returns true.
 * If the data already exist in file, writes an error and returns false.
 *
 * @param string $field_input - clean input value
 * @param array $field - input array
 * @return bool
 */
function validate_user_unique(string $field_input, array &$field): bool
{
    if (App::$db->getRowWhere('users', ['email' => $field_input])) {
        $field['error'] = 'User already exists';

        return false;
    }

    return true;
}

/**
 *
 *Checks if there is such email and password in the database.
 *
 * If there is such user and password is the same as in database returns true.
 * If email or password of $filtered_input are not in the database(or not the same),
 * writes an error and returns false.
 *
 * @param array $filtered_input - clean inputs array with values
 * @param array $form - form array
 * @return bool
 */
function validate_login(array $filtered_input, array &$form): bool
{

    if (App::$db->getRowWhere('users', [
        'email' => $filtered_input['email'],
        'password' => $filtered_input['password']
    ])) {

        return true;
    } else if (!validate_email($filtered_input['email'], $form['fields']['email']) && !empty($filtered_input['email'])) {
        $form['fields']['email']['error'] = 'Incorrect email format';

        return false;
    } else if (!App::$db->getRowWhere('users', [
        'email' => $filtered_input['email']]) && !empty($filtered_input['email'])) {
        $form['fields']['email']['error'] = 'User does not exist';

        return false;
    }
    else if (!empty($filtered_input['password'])) {
        $form['fields']['password']['error'] = 'Incorrect password';

        return false;
    }

    return false;
}

function validate_row_exists(string $field_input, array &$field): bool
{
    if (App::$db->rowExists('pizzas', $field_input)) {
        return true;
    }

    $field['error'] = 'Tokia eilute neegzistuoja';

    return false;
}

/**
 * Check if user with given email exists
 * @param string $field_input
 * @param array $field
 * @return bool
 */
function validate_email_exists(string $field_input, array &$field):bool
{
    if (App::$db->getRowWhere('users', ['email' => $field_input])) {
        return true;
    } else {
        $field['error'] = 'Email does not exist.';

        return false;
    }
}
