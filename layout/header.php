<div class="header_logo">
  <div class="container">

  
    <div class="col-md-6 text-left">
      <img src="images/logo.gif" />
    </div>
    <?php
    if(!$_SESSION['id'])
    {
    ?>
    <div class="col-md-6 text-right">
      <a href="index.php">Login</a>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="col-md-6 text-right">
      <a href="logout_session.php">Logout</a>
    </div>
    <?php
    }
    ?>
  </div>
</div>
