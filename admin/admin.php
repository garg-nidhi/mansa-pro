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
  mysqli_query($connec,$sql_query);
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
      <link rel="stylesheet" href="../common/back.css">

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


<script type="text/javascript">
  
  $(document).ready(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut(5000);

    // alert("chakk ");
  });
</script>

</head>
<body>
 <?php include("../layout/header.php"); ?>

 <div class="container">
<div class="se-pre-con"></div>

  <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
  <div class="col-md-12 admin_pg_height">
    <div class="row">

   </div>
   <div class="table-responsives">
    <table class="table table-striped admin_frnt_tbl">
      <thead>
       <tr class="first-chld">
        <th class="titleth" colspan="4"><p>Users</p></th>
        <th class="gfd-ygr"> <a href="#" class="btn btn-primary adduser" data-toggle="modal" data-target="#myModal">Add New User</a></th>
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
          <ul>
            
        
                <li><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="../bootstrap/images/edit.png" border="0" title="edit"></a></li>
                <li><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="../bootstrap/images/delete.png" border="0" title="delete"></a>
                </li>
       
          
          </ul>
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
        <button type="button" class="close mdl_crss" data-dismiss="modal">&times;</button>
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
         $sql_query = "INSERT INTO `user`(`name`,`email`,`password`,`role`, `created_at`) VALUES('$name','$email','$password', 'user', 'NOW()')";
   // sql query execution function
         if(mysqli_query($connec,$sql_query))
         {
          ?>
          <script type="text/javascript">
           
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

       <form class="form-horizontal" role="form" method="post" action="">

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
