<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../config.php';
session_start();
if(!$_SESSION['id'])
{
	header("location:../index.php");
}
// delete condition
if(isset($_GET['delete_id']))
{
  $sql_query="DELETE FROM user WHERE id=".$_GET['delete_id'];
  mysql_query($sql_query);
  header("Location: $_SERVER[PHP_SELF]");
}
?>

<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin-style.css" type="text/css" />
  <link rel="stylesheet" href="../login.css">
  <link rel="stylesheet" href="../adminpg.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/bc8520503f.js"></script>
  <script type="text/javascript">
    function edt_id(id)
    {
  //  if(confirm('Sure to edit ?'))
  //  {
    window.location.href='edit_user.php?edit_id='+id;
   //}
 }
 function delete_id(id)
 {
   if(confirm('Are you sure to Delete ?'))
   {
    window.location.href='admin.php?delete_id='+id;
  }
}
</script>

<script>
  $(document).ready(function(){
    $(window).resize(function () {
      var viewportWidth = $(window).width();
      if (viewportWidth <= 768) {
        $(".table-responsives").removeClass("table-responsives").addClass("table-responsive");
      }
    });
  });
</script>
</head>
<body>

 <?php include("../layout/header.php"); ?>

 <div class="container">
  <div class="col-md-12 admin_pg_height">
    <div class="row">
     <div class="col-md-6">
				<!-- <div class="set_padding">
					<h2 class="margin">Users</h2>
				</div> -->
			</div>
     <div class="col-md-6 text-right padding">
       <div class="set_padding">
         <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New User</a>
       </div>
     </div>
   </div>
   <div class="table-responsives">
    <table class="table table-striped">
      <thead>
       <tr class="first-chld">
        <th colspan="5">Users</th>
      </tr>
      <tr>
        <th>Sr.No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php
     $no=1;
     $sql_query="SELECT * FROM user where role='user'";
     $result_set=mysqli_query($connec, $sql_query);
     while($row=mysqli_fetch_row($result_set))
     {
       ?>
       <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td>
          <table  cellspacing="0" cellpadding="0" class="tbl-icons" style="border:0px;">
            <tbody>
              <tr>
                <td style="border:0px;"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="../bootstrap/images/edit.png" border="0" title="edit"></a></td>
                <td style="border:0px;"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="../bootstrap/images/delete.png" border="0" title="delete"></a>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <?php
      $no++;
    }
    ?>
  </tbody>
</table>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header add_usr_mdl">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title mdl_title">Add User</h4>
      </div>
      <div class="modal-body">
        <?php



        if(!$_SESSION['id'])
        {
          header("location:../index.php");
        }

        if(isset($_POST['btn-save']))
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
            alert('Data Is Inserted Successfully ');
            window.location.href='admin.php';
          </script>
          <?php
        }
        else
        {
          ?>
          <script type="text/javascript">
            alert('Error occured while inserting your data');
          </script>
          <?php
        }
 // sql query execution function
      }
      ?>

      <center>

       <form class="form-horizontal" role="form" method="post" action="form_to_email_script.php ">

        <div class="form-group">  
          <div class="col-sm-8 col-sm-offset-2"> 
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required=""> 
          </div> 
        </div> 
        <div class="form-group"> 
          <div class="col-sm-8 col-sm-offset-2"> 
            <input type="email" class="form-control" id="email" name="email" placeholder="you@domain.com" required=""> 
          </div> 
        </div> 
        <div class="form-group"> 
          <div class="col-sm-8 col-sm-offset-2">
          <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
          </div> 
        </div> 
        <div class="form-group"> 
          <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3"> 
            <button type="submit" id="submit" name="btn-save" class="btn-lg btn-primary mh_pl_ol">Submit</button>
          </div> 
        </div> 
        <!--end Form-->

          </form>


        </center>


      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>
</div>
</div>
<div class="footer">
 <div class="container">
   <p class="text-center">Copyright To MansaInfotech. All Rights Reserved</p>
 </div>
</div>


</body>
</html>
