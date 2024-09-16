<?php

/**
 * Add feedback to posttype after new feedback has been submitted
 */
add_action( 'forminator_custom_form_mail_before_send_mail', 'ct_add_new_feedback', 10, 3 );
function ct_add_new_feedback( $mail, $form, $data ) {
	$form_name = $form->name;

	$post_type = 'ct_feedback';
	$form_names = [ 'contact-bg', 'contact-en' ];
	$type_label = 'select-1';
	$type_value = 'feedback';
	$first_name_label = 'name-2';
	$last_name_label = 'name-3';
	$message_label = 'textarea-1';

	if( in_array($form_name, $form_names) && $data[$type_label] === $type_value) {
		$first_name = $data[$first_name_label];
		$last_name = $data[$last_name_label];
		$message = $data[$message_label];

		$post_data = [
			'post_title' => $first_name . ' ' .$last_name,
			'post_content' => $message, 
			'post_author' => 1,
			'post_status' => 'draft',
			'post_type' => $post_type
		];

		wp_insert_post($post_data);
	}
}
 