
<?php
session_start();
require("includes/db.php");
if (isset($_GET['l'])){
      session_destroy();
      ?>
<script type="text/javascript">
window.location = "index.php";
</script>
<?php
}

?>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Please Login| </title>

    <!-- Bootstrap -->

    <link href="./images/bg.gif" />
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>


<?php 

if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username && $password){
		$query = "SELECT * FROM users WHERE (pj = '".$username."' OR email like '".$username."')"; //AND password = crypt('".$password."', 'password')";
		echo "$query";



		// $result_users = pg_query_params($GLOBALS['conn'], $query);
    $result_users = pg_query($conn, $query);
    

if (!$result_users) {
  echo "An error occurred.\n";
  exit;
}

		if ($row = pg_fetch_assoc($result_users)) {

			if (true){
				$_SESSION['leave_pj'] = $row['pj'];
				$_SESSION['leave_fullname'] = $row['fullname'];
				$_SESSION['leave_email'] = $row['email'];
				$_SESSION['leave_group'] = $row['user_group'];
				?>
				<script type="text/javascript">
					window.location = "index.php";
				</script>
				<?php
			} else {    

				echo "Login failed. Wrong password";
			}
		} else {
			echo "Login failed. wrong username or password";
		}
	}
}  
?>	
	

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post" name="Login_Form" class="form-signin">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="PJ OR Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name ="submit" value="Login" type ="Submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New with us?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Progress Reporting </h1>
                  <p>The Chief Registrar of The Judiciary, Supreme Court of Kenya,City Hall Way, 
			P.O. BOX 30041-00100, Nairobi-Kenya. info@judiciary.go.keCopyright © Republic of Kenya: The Judiciary. All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Progress Reporting </h1>
                  <p>The Chief Registrar of The Judiciary, Supreme Court of Kenya,City Hall Way,
                        P.O. BOX 30041-00100, Nairobi-Kenya. info@judiciary.go.keCopyright © Republic of Kenya: The Judiciary. All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  <?php include "includes/admin_footer.php" ?>


  
