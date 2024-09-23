<?php 
/**
 * Update mail form to send from global email
 */
add_filter('wp_mail_from', function($email) {
     return get_option('admin_email');
},10);


/**
 * Update smtp server credentials
 */
function ct_phpmail_override( $phpmailer ) {
    $phpmailer->isSMTP();     
    $phpmailer->Host = SMTP_SERVER;
    $phpmailer->SMTPAuth = SMTP_AUTH; 
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_SERVER;
    $phpmailer->Password = SMTP_PORT;
}
add_action( 'phpmailer_init', 'ct_phpmail_override' );
