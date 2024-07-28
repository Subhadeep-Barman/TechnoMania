<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $register = new PHP_Email_Form;
  $register->ajax = true;
  
  $register->to = $receiving_email_address;
  $register->from_name = $_POST['name'];
  $register->from_email = $_POST['email'];
  $register->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $register->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $register->add_message( $_POST['name'], 'Name');
  $register->add_message( $_POST['email'], 'Email');
  $register->add_message( $_POST['phone'], 'Phone', 4);
  $register->add_message( $_POST['date'], 'Date', 4);
  $register->add_message( $_POST['time'], 'Time', 4);
  $register->add_message( $_POST['people'], '# of people', 1);
  $register->add_message( $_POST['message'], 'Message');

  echo $register->send();
?>
