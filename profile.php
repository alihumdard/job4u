<?php
include 'cdn_lniks.php';
$con     = mysqli_connect( "localhost", "root","", "job4u" );
if(isset($_SESSION['login'])&& !empty($_SESSION['login']))
{     $db                  =$con;
      $user_data           = array();
      $user_data           = $_SESSION['login'];
      $user_name           = $user_data['user_name'];
      $user_sur_name       = $user_data['user_surname'];
      $user_email          = $user_data['user_email'];
      $user_ph_no          = $user_data['user_ph_no']; 
      $user_id             = $user_data['user_id'];
      $fetch_enteries_rows = mysqli_num_rows(mysqli_query($db,"select * from user_entry where user_id ='$user_id'"));
              if($fetch_enteries_rows > 0)
              {
                $fetch_enteries_data = array();
                $query_result        = mysqli_query($db,"select * from user_entry where user_id ='$user_id' order by entry_id desc");
                        while ($row  = mysqli_fetch_assoc($query_result)){
                                  $fetch_enteries_data[]    = $row;
                        }
              }else
               {
                $err_msgs            = array();
                $err_msgs            = array("err_entry_msg" => "<label style=' margin:0 auto; color:black; background:yellow; font-size:30px;'> No Entery is  Saved Yet.!!</label>");
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
    <title>My Profile</title>

</head>
<body>
<!-- ===============navbar============== -->
<?php   include 'nav_bar.php';   ?>
<!-- ===================Profile=============== -->
<section class="Profile">
    <div class="container">
        <div class="Profile-p">
          <h2 class="py-5">My Profile</h2>
          <div class="">
              <h6>Name: <span> <?php  if(isset($user_name) && !empty($user_name)){echo "$user_name";}  ?></span></h6>
          </div>

          <div class="mt-4">
            <h6>Surname: <span><?php  if(isset($user_sur_name) && !empty($user_sur_name)){echo "$user_sur_name";}  ?></span></h6>
        </div>

        <div class="mt-4">
            <h6>E-Mail: <span> <?php  if(isset($user_email) && !empty($user_email)){echo "$user_email";}  ?></span></h6>
        </div>

        <?php  if(isset($user_ph_no) && !empty($user_ph_no)){ 
            ?>
        <div class="mt-4">
            <h6>Phone number: <span> <?php echo "$user_ph_no"; ?></span></h6>
        </div>
       <?php  }  ?>
        </div>

        <div class="entries  mt-5 pb-4">
            <div class="row">
                <div class="col-md-6">
                <div class="">
                <h2>My Entries</h2>
            </div>
                </div>
                <div class="col-md-6">
                <div class="ml-auto">
                <a href="new_entry.php" class="btn m-1 px-4 py" role="button" style="float: right;" aria-pressed="true">New Entries</a>
            </div>
                </div>
            </div>
           
            
        </div>
 
        <?php  
              if(isset($err_msgs['err_entry_msg']) && !empty($err_msgs['err_entry_msg']))
              {
                echo '<div class="entries d-flex mt-4 pb-4">'.$err_msgs['err_entry_msg'].'</div>';

              }else{

                foreach ($fetch_enteries_data as $value) {
                ?>


       <div class="entries  mt-4 pb-4">
        <div class="row">
            <div class="col-md-5">
            <div class="">
                <h5><?php  if(isset($value['entry_title']) && !empty($value['entry_title'])){echo $value['entry_title'];}  ?></h5>
                <p><?php  if(isset($value['entry_description']) && !empty($value['entry_description'])){echo substr($value['entry_description'],0,130);}  ?> ....</p>
                <p><?php  if(isset($value['entry_date']) && !empty($value['entry_date'])){echo $value['entry_date'];}  ?> </p>
                 <p><?php  if(isset($value['entry_location']) && !empty($value['entry_location'])){echo $value['entry_location'];}  ?></p>
            </div>
            </div>
            <div class="col-md-7">
            <div class="">
                <a href="edit_entry.php?entry_id=<?= $value['entry_id'] ?>" class="btn m-1 px-4 py mt-5" style="float: right;"  role="button" aria-pressed="true">Edit</a>
            </div>
            </div>
        </div>
            
           
        </div>
    <?php  } } ?>

    </div>
</section>
</body>
</html>