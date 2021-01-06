<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BA-EXCHANGE ADMIN</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>




    <section class="login-content">
      <div class="logo">
        <h1>BA-EXCHANGE</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="login.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <?php


            if(isset( $_GET['err_msg'])){
                echo "<p> <font color=red>". $_GET['err_msg']."<p>";
            }

            ?>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" name="email" type="email" required placeholder="Email" value="" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" required value="" placeholder="Password">
          </div>


          <div class="form-group btn-container">
              <input type="submit" class="btn btn-primary" value="Login">

          </div>
        </form>
            </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
  </body>
</html>