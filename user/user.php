<?php
include_once '../config.php';

session_start();
if(!$_SESSION['id'])
{
	header("location:../index.php");
}

if(isset($_POST['send-email']))
{
 // variables for input data
 $name = $_POST['name'];
 $designation = $_POST['designation'];
 $reporting_person = $_POST['reporting_person'];
 $leave_type = $_POST['leave_type'];
 $date = $_POST['date'];
 $time = $_POST['time'];
 $days = $_POST['days'];
 $leaves_availed = $_POST['leaves_availed'];
 $department = $_POST['department'];

 $to = "nidhigarg@mansainfotech.com";
 $subject = "Leave Application from" . $name;
 $message = '
 <html>
 <body>
  <table>
    <tr>
      <th>Employee Name</th>
      <td>'.$name.'</td>
    </tr>
    <tr>
      <th>Designation</th>
      <td>'.$designation.'</td>
    </tr>
    <tr>
      <th>Reporting Person</th>
      <td>'.$reporting_person.'</td>
    </tr>
    <tr>
      <th>Type of Leave (Short Leave/ Full day/ Half day):</th>
      <td>'.$leave_type.'</td>
    </tr>
    <tr>
      <th>Date:</th>
      <td>'.$date.'</td>
    </tr>
    <tr>
      <th>Time:</th>
      <td>'.$time.'</td>
    </tr>
    <tr>
      <th>No. of days:</th>
      <td>'.$days.'</td>
    </tr>
    <tr>
      <th>Leaves   Availed:</th>
      <td>'.$leaves_availed.'</td>
    </tr>
    <tr>
      <th>Department (.NET/ QA/ HR/iOS/Graphics):</th>
      <td>'.$department.'</td>
    </tr>
  </table>
</body>
</html>
';
$header = "From:".$_SESSION['email']." \r\n";
 //$header .= "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);
if( $retval == true ) {
  alert("Message sent successfully...");
}else {
  echo "Message could not be sent...";
}
}
?>
<!DOCTYPE>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Operations</title>
  <link rel="stylesheet" href="user-style.css" type="text/css" />
  <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="../common/back.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <script src="user-validation.js"></script>
  <style>
    select.error, label.error {
     color:#FF0000;
   }
 </style>
</head>
<body>
 <?php include("../layout/header.php"); ?>
 <center class="tb_cnter">


  <div class="container">
  <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
  <div class="col-md-2 col-sm-2 ">
    
  </div>
  <div class="tbl_body col-md-8 col-sm-8 col-xs-12 ">
    <form method="post" name="user">
     <table class="table table-bordered">
       <thead>
         <tr class="first-chld">
      <th colspan="2">Application form</th>
</tr>
</thead>
      <tbody>
       <tr>
        <th>Employee Name</th>
        <td>
          <input type="text" name="name" id="name"/>
        </td>
      </tr>
      <tr>
        <th>Designation</th>
        <td>
          <input type="text" name="designation" id="designation"/>
        </td>
      </tr>
      <tr>
        <th>Reporting Person</th>
        <td>
          <input type="text" name="reporting_person" id="reporting_person"/>
        </td>
      </tr>
      <tr>
        <th>Type of Leave</th>
        <td>
          <select name="leave_type" id="leave_type">
            <option value="Short Leave">Short Leave</option>
            <option value="Full day">Full day</option>
            <option value="Half day">Half day</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Date</th>
        <td>
          <input type="date" name="date" id="datepicker" min="2018-01-01">
        </td>
      </tr>
      <tr>
        <th>Time</th>
        <td>
          <input type="text" name="time" id="time" />
        </td>
      </tr>
      <tr>
        <th>No. of days</th>
        <td>
          <input type="text" name="days" id="days"/>
        </td>
      </tr>
      <tr>
        <th>Leaves Availed</th>
        <td>
          <input type="text" name="leaves_availed" id="leaves_availed"/>
        </td>
      </tr>
      <tr>
        <th>Department</th>
        <td>
          <select name="department" id="department">
           <option value=".NET">.NET</option>
           <option value="QA">QA</option>
           <option value="Designer/Graphics">Designer/Graphics</option>
           <option value="Node">Node</option>
           <option value="PHP">PHP</option>
         </select>
       </td>
     </tr>
     <tr style="text-align:center">
      <td colspan="2"><button class="btn btn-info blue_btn" type="submit" name="send-email"><strong>Send Mail</strong></button></td>
    </tr>
  </tbody>
</table>
</form>
</div>
  <div class="col-md-2 col-sm-2 "></div>

</div>
</center>

<?php include("../layout/footer.php"); ?>
</body>
</html>
