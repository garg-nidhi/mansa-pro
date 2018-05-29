<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$error = "";
if(isset($_REQUEST['loginBtn']))
{

$email=$_REQUEST['email'];
$pass=$_REQUEST['password'];
$conn =mysqli_connect("localhost","root","root","mansa_project");
$query=  "SELECT * FROM `user` where email='".$email."' and password='".$pass."'" ;

$str=mysqli_query($conn, $query) or mysql_die(mysqli_error($conn));
$row=mysqli_fetch_array($str);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($email!=$row['email'] || $pass!=$row['password']){
    $error = 'Incorect Email/Password';
  }
 
}
 elseif ($_SESSION['role'] == 'admin') {
    header("location:admin/admin.php");
    # code...
  }
  else  {
    # code...
    header("location:user/user.php");
  }

if(!$error && isset($_POST['loginBtn'])){
  if($email==$row['email'] && $pass==$row['password']){
      $_SESSION['id'] = $row['name'];
      $_SESSION['email'] = $email;
      $_SESSION['role'] = $row['role'];
      if($row['role'] == 'admin'){
        header("location:admin/admin.php");
      }
      else{
        header("location:user/user.php");
      }
  }
  else{
      header("location:index.php");
  }
}
}
?>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/bc8520503f.js"></script>
</head>
<body>
  <?php include("layout/header.php"); ?>
 <!-- JQUERY AND NORMALIZED CSS INSTALLED-->
<!-- View settings for more info.-->
<div id="pageContainer">
  <div id="formContainer">
    <div id="logo" ><img class="rotating" src="images/earth.png"/></div>
    <div id="forms">
      <!-- <form id="forgot">
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
      </form> -->
      <form method="post">
        <div class="formHead">
          <div style = "font-size:15px; color:#fff; margin-top:10px"><?php echo $error; ?></div>
          <h1>Login to continue</h1>
        </div>
        <div class="formDiv">
          <input class="inputMaterial" type="email" name="email" placeholder="Email" required autofocus="">
        </div>
        <div class="formDiv">
          <input class="inputMaterial" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="formDiv">
          <input type="submit" value="LOGIN" name="loginBtn"/>
        </div>
        <!-- <div class="formOther"><a href="#" class="forgotBtn">FORGOT PASSWORD?</a></div> -->
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
