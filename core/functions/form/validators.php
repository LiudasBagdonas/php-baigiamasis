<?php

/**
 * Check if field values are the same
 *
 * @param $form_values
 * @param array $form
 * @param array $params
 * @return bool
 */
function validate_fields_match($form_values, array &$form, array $params): bool
{
    foreach ($params as $field_index) {
        if ($form_values[$params[0]] !== $form_values[$field_index]) {
            $form['fields'][$field_index]['error'] = strtr('Field does not match with @field field', [
                '@field' => $form['fields'][$params[0]]['label']
            ]);

            return false;
        }
    }

    return true;
}

/**
 * Check if field is not empty
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_not_empty(string $field_value, array &$field): bool
{

    if ($field_value == '') {
        $field['error'] = 'Field must be filled';
        return false;
    }

    return true;
}


/**
 * Check if input is numeric
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_numeric(string $field_value, array &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Field input must be numeric';

        return false;
    };

    return true;
}


/**
 * Check if selected value is one of the possible options in options array
 *
 * @param string $field_input
 * @param array $field
 * @return bool
 */
function validate_select(string $field_input, array &$field): bool
{
    if (!isset($field['options'][$field_input])) {
        $field['error'] = 'Input doesn\'t exist';

        return false;
    }

    return true;
}

/**
 * Check if provided email is in correct format
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email(string $field_value, array &$field): bool
{
    if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $field_value)) {
        $field['error'] = 'Invalid email format';

        return false;
    }

    return true;
}

/**
 * Check if input is valid URL
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_url(string $field_value, array &$field): bool
{
    if (!filter_var($field_value, FILTER_VALIDATE_URL)) {
        $field['error'] = 'Input is not a valid URL';

        return false;
    };

    return true;
}

/**
 * Function checks if input includes only letters
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_name_symbols(string $field_value, array &$field): bool
{
    $rexSafety = "/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/
";

    if (preg_match($rexSafety, $field_value) || strpbrk($field_value, '1234567890')) {
        $field['error'] = 'Incorrect name';

        return false;
    } else {
        return true;
    }
}

/**
 * Function check if input includes max 40 symbols
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_length(string $field_value, array &$field): bool
{
    if (strlen($field_value) <= 40) {
        return true;
    } else {
        $field['error'] = 'Input too long. (Max 40 characters)';

        return false;
    }
}

/**
 * Function check if unnecesary input is filled and so, if it is filled properly
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_phone_not_required(string $field_value, array &$field): bool
{
    if ($field_value != '') {
        if (is_numeric($field_value) && strlen($field_value) <= 9) {
return true;
        } else {
            $field['error'] = 'Phone incorrect E.g. (860000000)';

            return false;
        }
    } else {
        return true;
    }
}

function validate_address_not_required(string $field_value, array &$field): bool
{
    if ($field_value != '') {
        if (strlen($field_value) <= 200) {
            return true;
        } else {
            $field['error'] = 'Maximum amount of symbols is 200';

            return false;
        }
    } else {
        return true;
    }
}