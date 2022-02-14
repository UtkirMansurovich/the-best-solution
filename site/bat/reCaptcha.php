<?php
// Initiate the autoloader.
require_once 'ReCaptcha/autoload.php';

// Register You API keys at https://www.google.com/recaptcha/admin
// And write it here
$siteKey = '6Lfxa3seAAAAAD68fsDWsLJ99WzuhQTDtZ2QAXBF';
$secret = '6Lfxa3seAAAAAClq7GF5_brwKQ0Vb0Z3DR2pApyw';

// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = 'en';

// If No key
if ($siteKey === '' || $secret === ''):
  die('CPT001');
elseif (isset($_POST['g-recaptcha-response'])):

  // If the form submission includes the "g-captcha-response" field
  // Create an instance of the service using your secret
  $recaptcha = new \ReCaptcha\ReCaptcha($secret);

  // Make the call to verify the response and also pass the user's IP address
  $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

  if ($resp->isSuccess()):
    // If the response is a success, that's it!
    die('CPT000');
  else:
    // Something wrong
    die('CPT002');
  endif;

endif;
?>
