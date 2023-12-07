<?php
include 'cdn_lniks.php';
if(isset($_SESSION['login'])&& !empty($_SESSION['login']))
{  
  header('location:index.php');
}else{
       $con              = mysqli_connect( "localhost", "root","", "job4u" );
       if(isset($_POST['btn_submit'])&& !empty($_POST['btn_submit']))
          { $db          =$con;
            $user_email  = mysqli_real_escape_string($con,$_POST['txt_email']);
            $user_pass   = mysqli_real_escape_string($con,$_POST['txt_pass']);
           $varify_email = mysqli_num_rows(mysqli_query($db,"select * from user_registration where user_email ='$user_email'"));
           $varify_pass  = mysqli_fetch_assoc(mysqli_query($db,"select * from user_registration where user_email ='$user_email' and user_password='$user_pass'")); 
          $prev_pass     =$varify_pass['user_password'];
           if(($varify_email > 0) && ($prev_pass == $user_pass))
                {
                          $_SESSION['login'] = $varify_pass;
                          if($_SESSION['login']){header('location:index.php');}
                }else
                 {          $err_msgs        = array();
                              if($varify_email == 0)
                              {
                                $err_msgs    = array("err_user" => "<label style='color:red; font-size:15px;'> * That E-mail is not correct !</label>"
                                );
                              }

                              if($user_pass   != $prev_pass){
                                  $err_msgs += array("err_pas" => "<label style='color:red; font-size:15px;'> * That Password is not correct !</label>"); 
                              }
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
    <title>Register</title>

    
</head>
<body>
<!-- ===============navbar============== -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">logo</a>
      <form class="form-inline ml-auto">
        <a href="Register.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true">Register</a>
        <!-- <a href="#" class="btn m-1 px-4 py-2" role="button" aria-pressed="true">Login</a> -->
      </form>
      
    </div>
  </nav>
<!-- ===================banner=============== -->
<section class="banner">
    <div class="container">
        <div class="banner-p m-auto">
          <h2 class="text-center py-5">Welcome!</h2>

          <form method="POST">
            <div class="form-group mt-2">
              <label for="txt_email">E-mail Address</label>
              <input type="email" name="txt_email"  class="form-control" id="txt_email" placeholder="Enter Your E-mail" required value="<?php  if(isset($user_email) && !empty($user_email)){echo "$user_email";}  ?>">
              <?php  
              if(isset($err_msgs['err_user']) && !empty($err_msgs['err_user']))
              {
                echo $err_msgs['err_user'];
              }
                ?>

            </div>
            <div class="form-row">
              <div class="form-group col-md-12 mt-2">
                <label for="txt_pass">Password</label>
                <input type="password" class="form-control" name="txt_pass" id="txt_pass" placeholder="Enter Your Password" required
                value="<?php  if(isset($user_pass) && !empty($user_pass)){echo "$user_pass";}  ?>">
                <?php  if(isset($err_msgs['err_pas']) && !empty($err_msgs['err_pas'])){
                echo $err_msgs['err_pas'];
                }
                ?>

              </div>
              
            </div>
            
            <div class="btn-p">
              <input type="submit" name="btn_submit" value="Sign in" class="btn px-5 mt-3 mb-4">

              <br>
              <a href="index.php" class="">Back to Home </a>
            </div>

          </form>
        </div>
    </div>
</section>
</body>
</html>