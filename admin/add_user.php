<?php
include_once '../config.php';

session_start();
if(!$_SESSION['id'])
{
	header("location:../index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
	if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
	if (empty($_POST["password"])) {
    $passErr = "Password is required";
  }
	// else {
  //   $password = test_input($_POST["password"]);
  //   // check if name only contains letters and whitespace
  //   if (!preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$",$password)) {
  //     $passErr = "Password contain atleast five characters, at least one letter and one number.";
  //   }
  // }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!$nameErr && !$emailErr && !$passErr && isset($_POST['btn-save']))
{
 // variables for input data
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 // sql query for inserting data into database
 $sql_query = "INSERT INTO user(name,email,password,role) VALUES('$name','$email','$password', 'user')";
 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Are Inserted Successfully ');
  window.location.href='admin.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 // sql query execution function
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User</title>
<link rel="stylesheet" href="admin-style.css" type="text/css" />
</head>
<body>
<center>
<div id="header">
  <div id="content">
     <label style="float:left">Add User</label>
     <label style="float:right"><a href="../logout_session.php">LOGOUT</a></label>
  </div>
</div>
<div id="body">
   <div id="content">
      <form method="post">
        <table align="center">
          <tr>
              <td><input type="text" name="name" placeholder="Name" />
							<span style="color: #FF0000;"> <?php echo $nameErr;?></span></td>
          </tr>
          <tr>
              <td><input type="email" name="email" placeholder="Email" />
							<span style="color: #FF0000;"> <?php echo $emailErr;?></span></td>
          </tr>
          <tr>
              <td><input type="password" name="password" placeholder="Password" />
							<span style="color: #FF0000;"> <?php echo $passErr;?></span></td>
          </tr>
          <tr>
            <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
          </tr>
        </table>
      </form>
    </div>
</div>
</center>
</body>
</html>
