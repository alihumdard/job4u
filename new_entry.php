<?php
include 'cdn_lniks.php';
$con     = mysqli_connect( "localhost", "root","", "job4u" );
if(isset($_SESSION['login'])&& !empty($_SESSION['login']))
{  
      $user_data      = array();
      $user_data      = $_SESSION['login'];
      $user_id      = $user_data['user_id'];
      if(isset($_POST['txt_submit'])&& !empty($_POST['txt_submit']))
        {   
          $db                 =$con;
          $entry_title        = mysqli_real_escape_string($con,$_POST['txt_title']);
          $entry_description  = mysqli_real_escape_string($con,$_POST['txt_desc']);
          $entry_location     = mysqli_real_escape_string($con,$_POST['txt_location']);
          $entry_employer     = mysqli_real_escape_string($con,$_POST['txt_employer']);
          $entry_contact      = mysqli_real_escape_string($con,$_POST['txt_contact']);
          $current_date       = date('d M. Y');
                    $inser_query        = "INSERT INTO `user_entry`(`entry_id`, `user_id`, `entry_title`, `entry_description`, `entry_location`, `entry_employer`, `entry_contact_no`, `entry_date`) VALUES ('','$user_id','$entry_title','$entry_description','$entry_location','$entry_employer','$entry_contact','$current_date')";
          $result             = mysqli_query($db,$inser_query);
                        if($result)
                        { 
                          header('location:profile.php');
                        }else{
                             $err_msgs  = array();
                             $err_msgs  = array("err_entry_msg" => "<label style=' margin:0 auto; color:black; background:red; font-size:30px;'> The Entery is Not is not Saved Yet.!!</label>"
                        );  
                         }
       }
}else{
header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Entry</title>

</head>
<body>
<!-- ===============navbar============== -->
<?php   include 'nav_bar.php';   ?>
<!-- ===================banner=============== -->
<section class="banner">
    <div class="container">
        <div class="banner-p m-auto pb-5">
          <h2 class="py-5">New Entry</h2>
           <?php  
              if(isset($err_msgs['err_entry_msg']) && !empty($err_msgs['err_entry_msg']))
              {
                echo $err_msgs['err_entry_msg'];
              }
                ?>

          <form method="POST">
            
            <div class="form-group">
              <label for="txt_title">Title</label>
              <input type="text" class="form-control" name="txt_title" id="txt_title" required placeholder="" value="<?php  if(isset($entry_title) && !empty($entry_title)){echo "$entry_title";}  ?>">
            </div>
            <div class="form-group mt-4">
                <label for="txt_desc">Description</label>
                <textarea class="form-control" name="txt_desc" id="txt_desc" required rows="4" >
                    <?php  if(isset($entry_description) && !empty($entry_description)){  $entry_description = trim($entry_description);
                     echo $entry_description;  }  ?>
                </textarea>
              </div>
            <div class="form-row">
                <div class="form-group col-md-6 mt-3">
                  <label for="txt_location">Location</label>
                  <input type="location" class="form-control" name="txt_location" required id="txt_location" placeholder="" value="<?php  if(isset($entry_location) && !empty($entry_location)){echo "$entry_location";}  ?>">
                </div>
                <div class="form-group col-md-6 mt-3">
                    <label for="txt_employer">Employer</label>
                    <input type="employer" class="form-control" required name="txt_employer" id="txt_employer" placeholder="" value="<?php  if(isset($entry_employer) && !empty($entry_employer)){echo "$entry_employer";}  ?>">
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 mt-3">
                  <label for="txt_contact">Contact</label>
                  <input type="email" class="form-control" name="txt_contact" id="txt_contact" placeholder="please enter your email" required value="<?php  if(isset($entry_contact) && !empty($entry_contact)){echo "$entry_contact";}  ?>">
                </div>
               <div class="new mt-4 pt-3 ml-auto">
                <a href="profile.php"> <input type="button"  class="btn m-1 px-4 py-2" class="form-control" name="btn_cancel" id="btn_cancel" value="Cancel"></a>
                <input type="submit" class="btn m-1 px-4 py-2" name="txt_submit" class="form-control" id="txt_submit" value="Submit">

               </div>
              </div>
          </form>
        </div>
    </div>
</section>
           </body>
</html>