<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/bc8520503f.js"></script>
</head>
<body>
  <?php include("layout/header.php"); ?>
 <!-- JQUERY AND NORMALIZED CSS INSTALLED-->
<!-- View settings for more info.-->
<div id="pageContainer">
  <div id="formContainer">
    <div id="logo"><img src="https://pbs.twimg.com/profile_images/810772925317951488/_vANfz0U.jpg"/></div>
    <div id="forms">
      
      <form id="forgot">
        <div class="fadeUp">
          <div class="formHead">
            <h1>FORGOT PASSWORD?</h1>
            <p>Looks like you forgot your password</p>
          </div>
          <div class="formDiv">
            <input type="email" placeholder="Type your email"/>
          </div>
          <div class="formDiv">
            <input type="submit" value="SEND EMAIL"/>
          </div>
          <div class="formOther"><a href="#" class="backLoginF">BACK TO LOGIN</a><a href="#">CONTACT STAFF</a></div>
        </div>
      </form>
      <form id="login">
        <div class="formHead">
          <h1>WELCOME BACK</h1>
          <p>Login to continue</p>
        </div>
        <div class="formDiv">
          <input type="text" placeholder="Username" name="username"/>
        </div>
        <div class="formDiv">
          <input type="password" placeholder="Password" name="password"/>
        </div>
        <div class="formDiv">
          <input type="submit" value="LOGIN"/>
        </div>
        <div class="formOther"><a href="#" class="forgotBtn">FORGOT PASSWORD?</a></div>
      </form>
      
    </div>
  </div>
</div>
  <?php include('layout/footer.php'); ?>
  <script type="text/javascript">
    

    // JQUERY
$(function() {
  
  // Switch to Register
  $('.needAccount, .backLogin').click(function() {
    $('#login, #register, #formContainer').toggleClass('switch');
  });
  
  // Open Forgot Password
  $('.forgotBtn, .backLoginF').click(function() {
    $('#forgot').toggleClass('forgot');
  });
  
  // Open Why Register
  $('.regBtn').click(function() {
    $('#whyReg').toggleClass('whyRegister');
  });
  
  
});
  </script>
</body>
</html>
