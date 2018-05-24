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
 echo  $retval;
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
  <title>CRUD Operations</title>
  <link rel="stylesheet" href="user-style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <center>
    <div id="header">
     <div id="content">
        <label style="float:left">Application Form</label>
        <label style="float:right"><a href="../logout_session.php">LOGOUT</a></label>
     </div>
    </div>
    <div id="body">
      <div id="content">
        <form method="post">
          <table>
            <tr>
              <th>Employee Name</th>
              <td><input type="text" name="name" placeholder="" /></td>
            <tr>
              <th>Designation</th>
              <td><input type="text" name="designation" placeholder="" /></td>
            </tr>
            <tr>
              <th>Reporting Person</th>
              <td><input type="text" name="reporting_person" placeholder="" /></td>
            </tr>
            <tr>
              <th>Type of Leave (Short Leave/ Full day/ Half day):</th>
              <td><input type="text" name="leave_type" placeholder="" /></td>
            </tr>
            <tr>
              <th>Date:</th>
              <td><input type="text" name="date" placeholder="" /></td>
            </tr>
            <tr>
              <th>Time:</th>
              <td><input type="text" name="time" placeholder="" /></td>
            </tr>
            <tr>
              <th>No. of days:</th>
              <td><input type="text" name="days" placeholder="" /></td>
            </tr>
            <tr>
              <th>Leaves   Availed:</th>
              <td><input type="text" name="leaves_availed" placeholder="" /></td>
            </tr>
            <tr>
              <th>Department (.NET/ QA/ HR/iOS/Graphics):</th>
              <td><input type="text" name="department" placeholder="" /></td>
            </tr>
            <tr style="text-align:center">
                <td colspan="2"><button type="submit" name="send-email"><strong>Send Mail</strong></button></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </center>
</body>
</html>
