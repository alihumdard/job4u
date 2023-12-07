<?php
include 'cdn_lniks.php';
$con                 = mysqli_connect( "localhost", "root","", "job4u" );
$db                  = $con;
$fetch_enteries_rows = mysqli_num_rows(mysqli_query($db,"select * from user_entry"));
      if($fetch_enteries_rows > 0)
      {
            $fetch_enteries_data   = array();
            $query_result          = mysqli_query($db,"SELECT * FROM `user_entry` order by entry_id desc");
            while ($row            = mysqli_fetch_assoc($query_result)){
            $fetch_enteries_data[] = $row;
            } 
      } else
        {
        $err_msgs  = array();
        $err_msgs  = array("err_entry_msg" => "<label style=' margin:0 auto; color:black; background:yellow; font-size:30px;'> No Entery is  Saved Yet.!!</label>");
         }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placeholder</title>

    
</head>
<body>
<?php   include 'nav_bar.php';   ?>
<!-- ===================placeholder=============== -->
<section class="placeholder">
    <div class="container">
        <div >
          
            <img class="text-center" style=" margin:0 auto; padding-top: 30px ; height: 350px; width: 100%;" src="assets/img/banner.jpg" alt="Place holder banner">
          
        </div>
        <div class="show-details mb-3">
          <div class="row">

                    <?php  
              if(isset($err_msgs['err_entry_msg']) && !empty($err_msgs['err_entry_msg']))
              {
                echo '<div class="entries d-flex mt-4 pb-4">'.$err_msgs['err_entry_msg'].'</div>';

              }else{

                foreach ($fetch_enteries_data as $value) {
                ?>

            <!-- secction frist is started -->
            <div class="col-md-6">
              <div class="show-details-card">
                <div class="entries  mt-5">
                  <div class="mt-3">
<div class="row">
  <div class="col-md-7">
  <h5><?php  if(isset($value['entry_title']) && !empty($value['entry_title'])){echo $value['entry_title'];}  ?></h5>
                <p><?php  if(isset($value['entry_description']) && !empty($value['entry_description'])){echo substr($value['entry_description'],0,60);}  ?>....</p>
                <p><b><?php  if(isset($value['entry_date']) && !empty($value['entry_date'])){echo $value['entry_date'];}  ?> </b></p>
                 <p><?php  if(isset($value['entry_location']) && !empty($value['entry_location'])){echo $value['entry_location'];}  ?></p> 

  </div>
  <div class="col-md-5">
  <div class="ml-auto mt-4">
                      <a href="entery_details.php?entry_id=<?= $value['entry_id'] ?>" class="btn m-1 px-4 mt-5" role="button" aria-pressed="true">Show Details</a>
                  </div>
  </div>
</div>
                      
                  </div>
                  
              </div>
              </div>
            </div>

<?php  } } ?>
          </div>
        </div>
    </div>
</section>
</body>
</html>
