<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/bc8520503f.js"></script>
</head>
<body>
  <?php include("layout/header.php"); ?>
  <div class="content_box">
    <div class="box">
      <div id="header">
        <div id="cont-lock"><i class="material-icons lock">lock</i></div>
        <div id="bottom-head"><h1 id="logintoregister">Login</h1></div>
      </div>
      <form action="login.php" method="post" class="formset">
        <div class="group">
          <input class="inputMaterial" type="email" name="email" placeholder="Email" required autofocus="">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Email</label>
        </div>
        <div class="group">
          <input class="inputMaterial" type="password" name="password" placeholder="Password" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Password</label>
        </div>
        <button id="buttonlogintoregister" name="loginBtn" value="Login" type="Submit">Login</button>
      </form>
      <div id="footer-box"></div>
    </div>
  </div>
  <?php include('layout/footer.php'); ?>
</body>
</html>
