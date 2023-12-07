<?php
include 'cdn_lniks.php';
$con      = mysqli_connect( "localhost", "root","", "job4u" );
$db       =$con;
$entry_id = $_GET['entry_id'];
        if(isset($_GET['entry_id'])&& !empty($_GET['entry_id']))
        {    
          $entry_id            = $_GET['entry_id'];
          $fetch_enteries_data = array();
          $query_result        = mysqli_query($db,"select * from user_entry where entry_id ='$entry_id'");
          $fetch_enteries_data = mysqli_fetch_assoc($query_result); 
          if($fetch_enteries_data){  
          $entry_title         = $fetch_enteries_data['entry_title'] ;
          $entry_description   = $fetch_enteries_data['entry_description'] ;
          $entry_location      = $fetch_enteries_data['entry_location'];
          $entry_employer      = $fetch_enteries_data['entry_employer'];
          $entry_contact       = $fetch_enteries_data['entry_contact_no'];
          $entry_date          = $fetch_enteries_data['entry_date'];
         }else{
                    $err_msgs  = array();
                    $err_msgs  = array("err_entry_msg" => "<label style=' margin:0 auto; color:black; background:red; font-size:30px;'> The Entery Details Not is not Fetched Yet.!!</label>");                            
         }
        } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>

    
</head>
<body>
<!-- ===============navbar============== -->
<?php   include 'nav_bar.php';   ?>
<!-- ===================Apply=============== -->
<section class="apply">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="apply-b mt-5 py-5">
                    <?php  
              if(isset($err_msgs['err_entry_msg']) && !empty($err_msgs['err_entry_msg']))
              {
                echo $err_msgs['err_entry_msg'];
              }
                ?>
                    <h5><?php  if(isset($entry_title) && !empty($entry_title)){echo "$entry_title";}  ?></h5>
                    <p><?php  if(isset($entry_description) && !empty($entry_description)){echo $entry_description ;}  ?> </p>
                            <p><b> <?php  if(isset($entry_date) && !empty($entry_date)){echo $entry_date;}  ?> </b></p>
                            <p><?php  if(isset($entry_location) && !empty($entry_location)){echo $entry_location; }  ?></p>
                            <p><?php  if(isset($entry_contact) && !empty($entry_contact)){echo $entry_contact;}  ?></span></p>
                            <p><?php  if(isset($entry_employer) && !empty($entry_employer)){echo $entry_employer;}  ?></p>
                </div>
            </div>
              <div class="col-md-5">
                   <div class="apply-btn mt-5 py-5">
                    <a href="mailto:<?php  if(isset($entry_contact) && !empty($entry_contact)){echo $entry_contact;}  ?>" class="btn m-1 px-4 py-2  m-auto">Apply</a>
                    <!-- <a href="index.html" >Apply</a> -->
                   </div>
              </div>
        </div>
    </div>
</section>
</body>
</html>
