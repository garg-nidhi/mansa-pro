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
 $result_set=mysqli_query($connec,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set);
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
 if(mysqli_query($sql_query))
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit User</title>
<link rel="stylesheet" href="admin-style.css" type="text/css" />
<link rel="stylesheet" href="../login.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
     <script src="adminjs/back.js" defer="defer"></script>
</head>
<body>
<?php include("../layout/header.php"); ?>
<!-- <div id="bg"> -->
 <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Edit User Here!</h3>
            </div>
            <div class="panel-body">
              <form role="form">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <input type="text" name="name" placeholder="Name" value="<?php echo $fetched_row['name']; ?>" class="form-control input-sm" >
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" name="email" placeholder="Email" value="<?php echo $fetched_row['email']; ?>" class="form-control input-sm" >
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <input type="password" name="password" placeholder="Password" value="<?php echo $fetched_row['password']; ?>" class="form-control input-sm" >
                    </div>
                  </div>
                 
                </div>
                
                 <div class="row">
                   <div class="col-xs-6 col-sm-6 col-md-6">
                 <button type="submit" class="btn btn-info btn-block" name="btn-update"><strong>UPDATE</strong></button>
                 </div>
                   <div class="col-xs-6 col-sm-6 col-md-6">
          <button type="submit" class="btn btn-info btn-block" name="btn-cancel"><strong>Cancel</strong></button>
          </div>
               
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->





</body>
</html>
