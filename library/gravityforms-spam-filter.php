<?php
/**
 * Flag messages with risky phone numbers as spam
 * https://docs.gravityforms.com/gform_entry_is_spam/
 */

add_filter( 'gform_entry_is_spam', 'filter_gform_entry_has_risky_phone', 11, 3 );
function filter_gform_entry_has_risky_phone( $is_spam, $form, $entry ) {
    if ( $is_spam ) return $is_spam;

    foreach ( $form['fields'] as $field ) {
        // Skip fields which are administrative or the wrong type.
        if ( $field->is_administrative() || $field->get_input_type() !== 'phone' ) continue;

        // Get the value of this field. Returns null if nothing found.
        $phone_number = rgar( $entry, $field->id );

        if (!empty($phone_number)) {
            // Spammers tend to use 11 digit phone numbers starting with 8.
            // For example: 86291448328.
            if (strlen($phone_number) == 11 && substr($phone_number, 0, 1) == '8') {
                return true;
            }

            // Eric Jones always uses the phone number '555-555-1212'.
            if (trim($phone_number) == '555-555-1212') {
                return true;
            }
        }
    }

    return false;
}
