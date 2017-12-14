<?php 
  foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
  }
  if (!empty($_GET)) {
    require_once "includes/recaptchalib.php";
    // your secret key
  $secret = "6LcIZzoUAAAAANbbclf35mEFeeLlgDB_YmTSkmAE";
  
  // empty response
  $response = null;
  
  // check secret key
  $reCaptcha = new ReCaptcha($secret);
  // if submitted check response
  if ($_POST["g-recaptcha-response"]) {
      $response = $reCaptcha->verifyResponse(
          $_SERVER["REMOTE_ADDR"],
          $_POST["g-recaptcha-response"]
      );
  }
  if ($response != null && $response->success) {
      echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
  }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>How to Integrate Google “No CAPTCHA reCAPTCHA” on Your Website</title>
  </head>
 
  <body>
 
    <form action="index2.php?a=1" method="post">
 
      <label for="name">Name:</label>
      <input name="name" required><br />
 
      <label for="email">Email:</label>
      <input name="email" type="email" required><br />
 
      <div class="g-recaptcha" data-sitekey="6LcIZzoUAAAAADBsXbLMFQNS3KYIcczBhrSIQqTM"></div>
 
      <input type="submit" value="Submit" />
 
    </form>
 
    <!--js-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
 
  </body>
</html>