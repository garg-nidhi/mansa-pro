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
	if (empty($_POST["designation"])) {
    $designationErr = "Designation is required";
  } else {
    $designation = test_input($_POST["designation"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$designation)) {
      $designationErr = "Only letters and white space allowed";
    }
  }
	if (empty($_POST["reporting_person"])) {
    $reportingPersonErr = "Reporting Person is required";
  } else {
    $reportingPerson = test_input($_POST["reporting_person"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$reportingPerson)) {
      $reportingPersonErr = "Only letters and white space allowed";
    }
  }
	if (empty($_POST["date"])) {
    $dateErr = "Date is required";
  }
	if ($_POST["time"]) {
    $time = test_input($_POST["time"]);
    if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/",$time)) {
      $timeErr = "Please use 24 hour in hh:mm format";
    }
  }
	if ($_POST["leaves_availed"]) {
    $leavesAvailed = test_input($_POST["leaves_availed"]);
		// check if name only contains number
    if (!is_numeric($leavesAvailed)) {
      $leavesAvailedErr = "Only numbers are allowed";
    }
	}
	if (empty($_POST["days"])) {
    $daysErr = "Days is required";
  } else {
    $days = test_input($_POST["days"]);
    // check if name only contains number
    if (!is_numeric($days)) {
      $daysErr = "Only numbers are allowed";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!$nameErr && !$designationErr && !$reportingPersonErr && !$dateErr && !$timeErr && !$leavesAvailed && !$daysErr && isset($_POST['send-email']))
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
echo $message;
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
  <title>CRUD Operations</title>
  <link rel="stylesheet" href="user-style.css" type="text/css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
              <td><input type="text" name="name" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $nameErr;?></span>
							</td>
            <tr>
              <th>Designation</th>
              <td><input type="text" name="designation" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $designationErr;?></span>
							</td>
            </tr>
            <tr>
              <th>Reporting Person</th>
              <td><input type="text" name="reporting_person" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $reportingPersonErr;?></span>
							</td>
            </tr>
            <tr>
              <th>Type of Leave</th>
              <td>
								<select name="leave_type">
							    <option value="Short Leave">Short Leave</option>
							    <option value="Full day">Full day</option>
							    <option value="Half day">Half day</option>
							  </select>
						  </td>
            </tr>
            <tr>
              <th>Date</th>
              <td><input type="text" name="date" id="datepicker">
								<span style="color: #FF0000;"> <?php echo $dateErr;?></span>
							</td>
            </tr>
            <tr>
              <th>Time</th>
              <td><input type="text" name="time" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $timeErr;?></span>
							</td>
            </tr>
            <tr>
              <th>No. of days</th>
              <td><input type="text" name="days" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $daysErr;?></span>
							</td>
            </tr>
            <tr>
              <th>Leaves   Availed</th>
              <td><input type="text" name="leaves_availed" placeholder="" />
								<span style="color: #FF0000;"> <?php echo $leavesAvailedErr;?></span>
							</td>
            </tr>
            <tr>
              <th>Department</th>
              <td>
								<select name="department">
									 <option value=".NET">.NET</option>
									 <option value="QA">QA</option>
									 <option value="Designer/Graphics">Designer/Graphics</option>
									 <option value="Node">Node</option>
									 <option value="PHP">PHP</option>
							 </select>
							</td>
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
