<?php
include 'cdn_lniks.php';
 $con     = mysqli_connect( "localhost", "root","", "job4u" );
if(isset($_POST['txt_submit'])&& !empty($_POST['txt_submit']))
{ $db             =$con;
  $user_name      = mysqli_real_escape_string($con,$_POST['txt_name']);
  $user_sur_name  = mysqli_real_escape_string($con,$_POST['txt_sur_name']);
  $user_email     = mysqli_real_escape_string($con,$_POST['txt_email']);
  $user_pass      = mysqli_real_escape_string($con,$_POST['txt_pass']);
  $user_c_pass    = mysqli_real_escape_string($con,$_POST['txt_v_pass']);
  $user_ph_no     = mysqli_real_escape_string($con,$_POST['txt_ph_no']);
  $check_username = mysqli_num_rows(mysqli_query($db,"select * from user_registration where user_surname ='$user_sur_name'"));
  $check_email = mysqli_num_rows(mysqli_query($db,"select * from user_registration where user_email ='$user_email'"));

            if(($user_pass   == $user_c_pass) && ($check_username == 0) && ($check_email == 0) )
            {   
                $inser_query = "INSERT INTO `user_registration`(`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_ph_no`, `user_status`) VALUES ('','$user_name','$user_sur_name','$user_email','$user_pass','$user_ph_no','1')";
                $result      = mysqli_query($db,$inser_query);

                if($result)
                { 
                  $user_data = mysqli_fetch_assoc(mysqli_query($db,"select * from user_registration where user_surname ='$user_sur_name' && user_email ='$user_email' && user_password='$user_pass'"));
                  $_SESSION['login']   = $user_data;
                  if($_SESSION['login']){header('location:index.php');}
                }
            } else
              {       $err_msgs         = array();
                      if($check_username > 0)
                      {
                        $err_msgs        = array("err_user" => "<label style='color:red; font-size:15px;'> * That user name is already taken</label>"
                        );
                      }
                      if($user_pass   != $user_c_pass){
                            $err_msgs += array("err_pas" => "<label style='color:red; font-size:15px;'> * The Confirm Passowrd don't matched!</label>"); 
                      }
                      if($check_email > 0){
                            $err_msgs += array("err_email" => "<label style='color:red; font-size:15px;'> * That email address is already registered! </label>"); 
                      }

              }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
<!-- ===============navbar============== -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">logo</a>
      <form class="form-inline ml-auto">
        <!-- <a href="#" class="btn m-1 px-4 py-2" role="button" aria-pressed="true">Register</a> -->
        <a href="login.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true">Login</a>
      </form>
      
    </div>
  </nav>
<!-- ===================banner=============== -->
<section class="banner">
    <div class="container">
        <div class="banner-p m-auto">
          <h2 class="text-center py-5">Registration</h2>
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputname">Name</label>
                <input type="name" name="txt_name" class="form-control" id="inputname" placeholder="" required value="<?php  if(isset($user_name) && !empty($user_name)){echo "$user_name";}  ?>" >
              </div>
              <div class="form-group col-md-6">
                <label for="inputSurname">Surname</label>
                <input type="text" name="txt_sur_name" class="form-control" id="inputSurname" placeholder="" required value="<?php  if(isset($user_sur_name) && !empty($user_sur_name)){echo "$user_sur_name";}  ?>"  >
              <?php  
              if(isset($err_msgs['err_user']) && !empty($err_msgs['err_user']))
              {
                echo $err_msgs['err_user'];
              }
                ?>

              </div>
            </div>
           
            <div class="form-group mt-2">
              <label for="inputemail">E-mail Address</label>
              <input type="email" name="txt_email"class="form-control" id="inputemail" placeholder="Enter Your E-mail" required value="<?php  if(isset($user_email) && !empty($user_email)){echo "$user_email";}  ?>" >
              <?php  
              if(isset($err_msgs['err_email']) && !empty($err_msgs['err_email']))
              {
                echo $err_msgs['err_email'];
              }
                ?>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6 mt-2">
                <label for="inputPassword">Password</label>
                <input type="password" name="txt_pass" class="form-control" id="inputPassword" placeholder="Enter Your Password" required value="<?php  if(isset($user_pass) && !empty($user_pass)){echo "$user_pass";}  ?>" >
              </div>
              <div class="form-group col-md-6 mt-2">
                <label for="inputVpassword">Verify Password</label>
                <input type="password" name="txt_v_pass" class="form-control" id="inputVpassword" placeholder="Enter Confirm Passowrd" required value="<?php  if(isset($user_c_pass) && !empty($user_c_pass)){echo "$user_c_pass";}  ?>" >
                <?php  if(isset($err_msgs['err_pas']) && !empty($err_msgs['err_pas'])){
                echo $err_msgs['err_pas'];
                }
                ?>
              </div>
            </div>
            <div class="form-group col-md-12 p-0">
              <label for="inputPhnumber">Phone number</label>
              <input type="number" class="form-control" name="txt_ph_no" id="inputPhnumber" placeholder=""  value="<?php  if(isset($user_ph_no) && !empty($user_ph_no)){echo "$user_ph_no";}  ?>" >
            </div>
            <div class="btn-p">
              <input type="submit" name="txt_submit" id="txt_submit" class="btn px-5 mt-3 mb-4" value="Register" ><br>
              <a href="index.php" class="pb-5">Back to Home </a>
            </div>
          </form>
        </div>
    </div>
</section>
</body>
</html>
