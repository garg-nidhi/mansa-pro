<?php
include_once '../config.php';

session_start();
if(!$_SESSION['id'])
{
	header("location:../index.php");
}


if(isset($_GET['edit_id']))
{
 $sql_query="SELECT * FROM user WHERE id=".$_GET['edit_id'];
 $result_set=mysql_query($sql_query);
 $fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
 // variables for input data
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 // variables for input data

 // sql query for update data into database
 $sql_query = "UPDATE user SET name='$name',email='$email',password='$password' WHERE id=".$_GET['edit_id'];
 // sql query for update data into database

 // sql query execution function
 if(mysql_query($sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Data Are Updated Successfully');
  window.location.href='admin.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: admin.php");
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>
<link rel="stylesheet" href="admin-style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
  <div id="content">
     <label style="float:left">Edit User</label>
     <label style="float:right"><a href="../logout_session.php">LOGOUT</a></label>
  </div>
</div>

<div id="body">
 <div id="content">
    <form method="post">
      <table align="center">
        <tr>
          <td><input type="text" name="name" placeholder="Name" value="<?php echo $fetched_row['name']; ?>" required /></td>
        </tr>
        <tr>
          <td><input type="text" name="email" placeholder="Email" value="<?php echo $fetched_row['email']; ?>" required /></td>
        </tr>
        <tr>
          <td><input type="password" name="password" placeholder="Password" value="<?php echo $fetched_row['password']; ?>" required /></td>
        </tr>
        <tr>
          <td>
          <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
          <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
          </td>
        </tr>
      </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
