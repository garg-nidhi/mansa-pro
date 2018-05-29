<?php
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../login.css">
  <link rel="stylesheet" href="../adminpg.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<!-- <div class="header_logo">
	  <div class="container">
	    <div class="col-md-6 text-left">
	      <img src="../bootstrap/images/logo.png" />
	    </div>
	    <div class="col-md-6 text-right">
	      <a href="../logout_session.php">Logout</a>
	    </div>
	  </div>
	</div> -->
  <div class="container">
		<div class="row">
		<!-- 	<div class="col-md-6">
				<div class="set_padding">
					<h2 class="margin">Users</h2>
				</div>
			</div> -->
	    <!-- <div class="col-md-6 text-right padding">
	      <div class="set_padding">
					<a href="add_user.php" class="btn btn-primary">Add New User</a>
	    	</div>
	    </div> -->
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
	           $result_set=mysql_query($sql_query);
	           while($row=mysql_fetch_row($result_set))
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
  </div>
	<div class="footer">
	  <div class="container">
	    <p class="text-center">Copyright To MansaInfotech. All Rights Reserved</p>
	  </div>
	</div>
</body>
</html>
